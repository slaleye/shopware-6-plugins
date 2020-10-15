<?php declare(strict_types=1);


namespace Slaleye\ProductBundler\Core\Content\Bundle;


use Shopware\Core\Content\Product\ProductCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class BundleEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $discountType;

    /**
     * @var float
     */
    protected $discount;

    /**
     * @var ProductCollection|null
     */

    /**
     * @var string
     */
    protected $name;

    protected $products;

    /**
     * Exercise begin --
     * @var bool
     */
    protected $stackable;

    /**
     * @return bool
     */
    public function isStackable(): bool
    {
        return $this->stackable;
    }

    /**
     * @param bool $stackable
     */
    public function setStackable(bool $stackable)
    {
        $this->stackable = $stackable;
    }
    /**
     * Exercise End --
     */

    public function getDiscountType(): string
    {
        return $this->discountType;
    }

    public function setDiscountType(string $discountType): void
    {
        $this->discountType = $discountType;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    public function getProducts(): ?ProductCollection
    {
        return $this->products;
    }

    public function setProducts(ProductCollection $products): void
    {
        $this->products = $products;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}