<?php declare(strict_types=1);

namespace Slaleye\ShopFinder\Storefront\Subscriber;


use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FooterSubscriber implements EventSubscriberInterface
{

    /**
     * @var SystemConfigService
     */
    private $systemConfigService;

    /**
     * @var EntityRepositoryInterface
     */
    private $shopFinderRepository;
    public function __construct(SystemConfigService $systemConfigService,EntityRepositoryInterface $shopFinderRepository)
    {
        $this->systemConfigService = $systemConfigService;
        $this->shopFinderRepository = $shopFinderRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
          FooterPageletLoadedEvent::class => 'onFooterPageletLoaded'
        ];
    }

    /**
     * @param FooterPageletLoadedEvent $event
     */
    public function onFooterPageletLoaded(FooterPageletLoadedEvent $event) :void
    {
        if(!$this->systemConfigService->get('SlaleyeShopFinder.config.showInStorefront')){
            return;
        }

        $shops = $this->fetchShops($event->getContext());

        // Add data to PageLet as an extension so we can access it within the template
        $event->getPagelet()->addExtension('slaleye_shop_finder',$shops);
    }

    /**
     * @param Context $context
     * @return EntityCollection
     */
    private function fetchShops(Context $context)
    {
        $criteria = new Criteria();
        $criteria->addAssociation('country'); // So we get the full country with names
        $criteria->addFilter(new EqualsFilter('active','1'));
        $criteria->setLimit(5);

        return $this->shopFinderRepository->search($criteria,$context)->getEntities();
    }
}