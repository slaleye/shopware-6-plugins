import template from './slaleye-shop-finder-detail.html.twig';

const {Component, Mixin} = Shopware;

Component.register('slaleye-shop-finder-detail', {
    template,

    inject: [
        'repositoryFactory'
    ],

    mixins: [
        Mixin.getByName('notification')
    ],

    metaInfo() {
        return {
            title: this.$createTitle()
        };
    },

    data() {
        return {
            shop: null,
            isLoading: false,
            processSuccess: false,
            repository: null
        };
    },


    created() {
        this.repository = this.repositoryFactory.create('slaleye_shop_finder_shop');
        this.getShop();
    },

    methods: {
        getShop() {
            this.repository
                .get(this.$route.params.id, Shopware.Context.api)
                .then((entity) => {
                    this.shop = entity;
                });
        },

        onClickSave() {
            this.isLoading = true;

            this.repository
                .save(this.shop, Shopware.Context.api)
                .then(() => {
                    this.getShop();
                    this.isLoading = false;
                    this.processSuccess = true;
                }).catch((exception) => {
                this.isLoading = false;
                this.createNotificationError({
                    title: this.$tc('slaleye-shop-finder.page.detail.errorTitle'),
                    message: exception
                });
            });
        },

        saveFinish() {
            this.processSuccess = false;
        },
    }
});