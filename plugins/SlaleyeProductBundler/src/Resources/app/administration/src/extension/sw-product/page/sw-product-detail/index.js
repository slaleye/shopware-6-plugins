const {Component} = Shopware;


// Override the sw-product-detail component


// override computed property ProductCriteria and add bundles association criteria

Component.override('sw-product-detail', {
    computed: {
        productCriteria() {
            const criteria = this.$super('productCriteria');
            criteria.addAssociation('bundles');

            return criteria;
        },
    }

});