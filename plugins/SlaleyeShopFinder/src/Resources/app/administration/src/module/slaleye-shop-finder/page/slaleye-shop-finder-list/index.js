import template from './slaleye-shop-finder-list.html.twig';

const {Component} = Shopware;
const {Criteria} = Shopware.Data;

Component.register('slaleye-shop-finder-list', {
    template,

    inject: [
        'repositoryFactory'
    ],

    data() {
        return {
            repository: null,
            shops: null
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
                label: this.$tc('slaleye-shop-finder.page.list.columnName'),
                routerLink: 'slaleye.shop.finder.detail',
                inlineEdit: 'string',
                allowResize: true,
                primary: true
            }, {
                property: 'streetName',
                dataIndex: 'streetName',
                label: this.$tc('slaleye-shop-finder.page.list.columnStreetName'),
                allowResize: true
            }, {
                property: 'city',
                dataIndex: 'city',
                label: this.$tc('slaleye-shop-finder.page.list.columnCity'),
                allowResize: true
            }, {
                property: 'active',
                dataIndex: 'active',
                label: this.$tc('slaleye-shop-finder.page.list.columnActive'),
                inlineEdit: 'boolean',
                allowResize: true
            }];
        }
    },

    created() {
        this.repository = this.repositoryFactory.create('slaleye_shop_finder_shop');

        this.repository
            .search(new Criteria(), Shopware.Context.api)
            .then((result) => {
                this.shops = result;
            });
    }
});