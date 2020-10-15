<?php


namespace Slaleye\ProductBundler\Core\Content\Product;


use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Slaleye\ProductBundler\Core\Content\Bundle\Aggregate\BundleProduct\BundleProductDefinition;
use Slaleye\ProductBundler\Core\Content\Bundle\BundleDefinition;

class ProductExtension extends EntityExtension
{

    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new ManyToManyAssociationField(
                'slaleyePblrBundles',
                BundleDefinition::class,
                BundleProductDefinition::class,
                'product_id',
                'bundle_id'
            ))->addFlags(new Inherited())
        );
    }

    public function getDefinitionClass(): string
    {
        return ProductDefinition::class;
    }
}