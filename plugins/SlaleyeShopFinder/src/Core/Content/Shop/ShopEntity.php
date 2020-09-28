<?php declare(strict_types=1);

namespace Slaleye\ShopFinder\Core\Content\Shop


use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class ShopEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $streetName;

    /**
     * @var string
     */
    protected $streetNumber;

    /**
     * @var string
     */
    protected $postCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string|null
     */
    protected $website;

    /**
     * @var string|null
     */
    protected $telephone;

    /**
     * @var string|null
     */
    protected $openningHours

    /**
     * @var CountryEntitiy|null
     */
    protected $country;


   
}
