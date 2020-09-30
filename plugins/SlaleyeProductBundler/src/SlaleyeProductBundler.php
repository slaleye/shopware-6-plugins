<?php declare(strict_types=1);

namespace Slaleye\ProductBundler;

use Shopware\Core\Framework\DataAbstractionLayer\Indexing\EntityIndexerRegistry;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;

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
}