<?php declare(strict_types=1);

namespace Slaleye\ShopFinder\Core\Content\Shop;


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
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStreetName(): string
    {
        return $this->streetName;
    }

    /**
     * @param string $streetName
     */
    public function setStreetName(string $streetName)
    {
        $this->streetName = $streetName;
    }

    /**
     * @return string
     */
    public function getStreetNumber(): string
    {
        return $this->streetNumber;
    }

    /**
     * @param string $streetNumber
     */
    public function setStreetNumber(string $streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     */
    public function setPostCode(string $postCode)
    {
        $this->postCode = $postCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(string $website)
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string|null $telephone
     */
    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return string|null
     */
    public function getOpenningHours(): string
    {
        return $this->openningHours;
    }

    /**
     * @param string|null $openningHours
     */
    public function setOpenningHours(string $openningHours)
    {
        $this->openningHours = $openningHours;
    }

    /**
     * @return CountryEntitiy|null
     */
    public function getCountry(): CountryEntitiy
    {
        return $this->country;
    }

    /**
     * @param CountryEntitiy|null $country
     */
    public function setCountry(CountryEntitiy $country)
    {
        $this->country = $country;
    }

    /**
     * @var string|null
     */
    protected $openningHours;

    /**
     * @var CountryEntitiy|null
     */
    protected $country;


   
}
