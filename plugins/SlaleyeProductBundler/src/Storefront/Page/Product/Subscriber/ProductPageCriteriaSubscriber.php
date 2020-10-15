<?php declare(strict_types=1);

namespace Slaleye\ProductBundler\Storefront\Page\Product\Subscriber;

use Shopware\Storefront\Page\Product\ProductLoaderCriteriaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductPageCriteriaSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        // TODO: Implement getSubscribedEvents() method.
        return [
            ProductLoaderCriteriaEvent::class => 'onProductCriteriaLoaded'
        ];
    }

    public function onProductCriteriaLoaded(ProductLoaderCriteriaEvent $event): void
    {
        //$event->getCriteria()->addAssociation('bundles.products.cover');
        $event->getCriteria()->addAssociation('slaleyePblrBundles.products.cover');
    }
}