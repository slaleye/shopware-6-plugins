<?php declare(strict_types=1);

namespace Slaleye\ProductBundler;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class SlaleyeProductBundler extends Plugin
{
    /* use the EntityIndexerRegistry to run the Indexer asynchronously
    in your plugin base class activate()-method.
    */
    public function activate(ActivateContext $activateContext): void
    {
        $registry = $this->container->get(EntityIndexerRegistry::class);
        $registry->sendIndexingMessage(['product.indexer']);
    }


    public function uninstall(UninstallContext $context): void
    {
        parent::uninstall($context);
      // if KeepUserData is set return else delete the tables created
        if ($context->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);

        $connection->executeUpdate('DROP TABLE IF EXISTS `slaleye_product_bundler_bundle_product`');
        $connection->executeUpdate('DROP TABLE IF EXISTS `slaleye_product_bundler_bundle_translation`');
        $connection->executeUpdate('DROP TABLE IF EXISTS `slaleye_product_bundler_bundle`');
        $connection->executeUpdate('ALTER TABLE `product` DROP COLUMN `bundles`');
    }
}