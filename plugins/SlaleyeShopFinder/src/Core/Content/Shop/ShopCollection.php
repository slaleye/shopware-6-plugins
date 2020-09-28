<?php declare(strict_types=1);

namespace Slaleye\ShopFinder\Core\Content\Shop;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void            add(ShopEntity $entity)
 * @method void            set(string $key, ShopEntity $entity)
 * @method ShopEntity[]    getIterator()
 * @method ShopEntity[]    getElements()
 * @method ShopEntity|null get(string $key)
 * @method ShopEntity|null first()
 * @method ShopEntity|null last()
 */
class ShopCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        // TODO return ShopEntity::class;
    }
}
