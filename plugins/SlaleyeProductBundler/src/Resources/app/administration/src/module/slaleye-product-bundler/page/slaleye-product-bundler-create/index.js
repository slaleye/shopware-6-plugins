const {Component} = Shopware;

Component.extend('slaleye-product-bundler-create', 'slaleye-product-bundler-detail', {
    methods: {
        getBundle() {
            this.bundle = this.repository.create(Shopware.Context.api);
        },

        onClickSave() {
            this.isLoading = true;

            this.repository
                .save(this.bundle, Shopware.Context.api)
                .then(() => {
                    this.isLoading = false;
                    this.$router.push({name: 'slaleye.product.bundler.detail', params: {id: this.bundle.id}});
                }).catch((exception) => {
                this.isLoading = false;

                this.createNotificationError({
                    title: this.$t('slaleye-product-bundler.detail.errorTitle'),
                    message: exception
                });
            });
        }
    }
});