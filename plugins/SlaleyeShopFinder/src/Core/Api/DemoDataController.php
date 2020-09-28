<?php declare(strict_types=1);

namespace  Slaleye\ShopFinder\Core\Api;

use Faker\Factory;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\System\Country\CountryEntity;
use Shopware\Core\System\Country\Exception\CountryNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"api"})
 */
class DemoDataController extends AbstractController
{
    /**
     * @var EntityRepositoryInterface
     */
    private $countryRepository;

    /**
     * @var EntityRepositoryInterface
     */
    private $shopFinderRepository;


    public function __construct(EntityRepositoryInterface $countryRepository, EntityRepositoryInterface $shopFinderRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->shopFinderRepository = $shopFinderRepository;

    }

    /**
     * @Route("/api/v{version}/_action/slaleye-shop-finder/generate", name="api.custom.slaleye_shop_finder.generate",methods={"POST"})
     * @param Context $context
     * @return Response
     */
    public function generate(Context $context): Response
    {
        $faker = Factory::create();
        $country = $this->getActiveCountry($context);

        $countries = [];

        for ($i = 0; $i < 50; $i++) {
            $countries[] = [
                'id' => Uuid::randomHex(),
                'active' => true,
                'name' => $faker->name,
                'streetName' => $faker->streetName,
                'streetNumber' => $faker->numberBetween(1, 60),
                'postCode' => $faker->postcode,
                'city' => $faker->city,
                'countryId' => $country->getId(),
            ];
        }

        $this->shopFinderRepository->create($countries, $context);

        return new Response('',Response::HTTP_NO_CONTENT);

    }

    /**
     * @param Context $context
     * @return CountryEntity
     */
    private function getActiveCountry(Context $context): CountryEntity
    {
        // Search in the db where country is active
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('active', '1'));

        // Add a limit of 1
        $criteria->setLimit(1);

        // Get Country
        $country = $this->countryRepository->search($criteria, $context)->getEntities()->first();

        if ($country === null) {
            throw new CountryNotFoundException('');
        }

        return $country;
    }

}