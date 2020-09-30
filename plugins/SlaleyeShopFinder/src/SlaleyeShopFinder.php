<?php declare(strict_types=1);

namespace Slaleye\ShopFinder;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;

class SlaleyeShopFinder extends Plugin
{

    public function uninstall(UninstallContext $context): void
    {
        parent::uninstall($context);
        // if KeepUserData is set return else delete the tables created
        if ($context->keepUserData()) {
            return;
        }

        $connection = $this->container->get(Connection::class);

        $connection->executeUpdate('DROP TABLE IF EXISTS `slaleye_shop_finder_shop`');

    }
}