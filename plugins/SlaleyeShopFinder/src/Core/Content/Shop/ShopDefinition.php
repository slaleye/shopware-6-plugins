<?php declare(strict_types=1);

namespace Slaleye\ShopFinder\Core\Content\Shop;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\System\Country\CountryDefinition;



class ShopDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'slaleye_shop_finder_shop';


    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }

    public function getEntityClass(): string
    {
        return ShopEntity::class;
    }

    public function getCollectionClass(): string
    {
        return ShopCollection::class;
    }


    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new Required(), new PrimaryKey()),
            (new BoolField('active', 'active')),
            (new StringField('name', 'name'))->addFlags(new Required()),
            (new StringField('street_name', 'streetName'))->addFlags(new Required()),
            (new StringField('street_number', 'streetNumber'))->addFlags(new Required()),
            (new StringField('post_code', 'postCode'))->addFlags(new Required()),
            (new StringField('city', 'city'))->addFlags(new Required()),
            (new StringField('website', 'website'))->addFlags(new Required()),
            (new StringField('telephone', 'telephone'))->addFlags(new Required()),
            (new LongTextField('openning_hours', 'openningHours'))->addFlags(new Required()),

            (new FkField('country_id', 'countryId', CountryDefinition::class)),
            (new ManyToOneAssociationField('country', 'countryId',CountryDefinition::class,id,false))
           
        ]);
    }
}