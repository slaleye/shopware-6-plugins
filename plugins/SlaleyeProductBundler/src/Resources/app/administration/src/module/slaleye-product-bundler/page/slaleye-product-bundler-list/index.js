import template from './slaleye-product-bundler-list.html.twig';

const {Component} = Shopware;
const {Criteria} = Shopware.Data;

Component.register('slaleye-product-bundler-list', {
    template,

    inject: [
        'repositoryFactory'
    ],

    data() {
        return {
            repository: null,
            bundles: null
        };
    },

    metaInfo() {
        return {
            title: this.$createTitle()
        };
    },

    computed: {
        columns() {
            return [{
                property: 'name',
                dataIndex: 'name',
                label: this.$tc('slaleye-product-bundler.list.columnName'),
                routerLink: 'slaleye.product.bundler.detail',
                inlineEdit: 'string',
                allowResize: true,
                primary: true
            }, {
                property: 'discount',
                dataIndex: 'discount',
                label: this.$tc('slaleye-product-bundler.list.columnDiscount'),
                inlineEdit: 'number',
                allowResize: true
            }, {
                property: 'discountType',
                dataIndex: 'discountType',
                label: this.$tc('slaleye-product-bundler.list.columnDiscountType'),
                allowResize: true
            }];
        }
    },

    created() {
        this.repository = this.repositoryFactory.create('slaleye_product_bundler_bundle');

        this.repository
            .search(new Criteria(), Shopware.Context.api)
            .then((result) => {
                this.bundles = result;
            });
    }
});