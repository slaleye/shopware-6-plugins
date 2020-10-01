import template from './sw-product-detail-base.html.twig';

const {Component} = Shopware;

// Override sw-product-detail base and add template
// ADd saveProduct method that uses the productRepository to save the current product

Component.override('sw-product-detail-base', {
    template,

    computed: {
        productRepository() {
            return this.repositoryFactory.create('product');
        },
    },

    methods: {
        saveProduct() {
            if (this.product) {
                this.productRepository.save(this.product, Shopware.Context.api);
            }
        }
    }

});