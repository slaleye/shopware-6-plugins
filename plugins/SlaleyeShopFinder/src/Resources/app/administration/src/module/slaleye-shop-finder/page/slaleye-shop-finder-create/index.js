const {Component} = Shopware;

Component.extend('slaleye-shop-finder-create', 'slaleye-shop-finder-detail', {
    methods: {
        getShop() {
            this.shop = this.repository.create(Shopware.Context.api);
        },

        onClickSave() {
            this.isLoading = true;

            this.repository
                .save(this.shop, Shopware.Context.api)
                .then(() => {
                    this.isLoading = false;
                    this.$router.push({name: 'slaleye.shop.finder.detail', params: {id: this.shop.id}});
                }).catch((exception) => {
                this.isLoading = false;

                this.createNotificationError({
                    title: this.$t('slaleye-shop-finder.page.detail.errorTitle'),
                    message: exception
                });
            });
        }
    }
});