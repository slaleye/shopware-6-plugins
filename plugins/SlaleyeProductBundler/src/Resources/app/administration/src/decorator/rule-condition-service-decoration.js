import '../core/component/slaleye-product-bundler-cart-contains-bundle';

const { Application } = Shopware;

Application.addServiceProviderDecorator('ruleConditionDataProviderService', (ruleConditionService) => {
    ruleConditionService.addCondition('slaleyeProductBundlerContainsBundle', {
        component: 'slaleye-product-bundler-cart-contains-bundle',
        label: 'sw-condition.condition.cartContainsBundle.label',
        scopes: ['cart']
    });

    return ruleConditionService;
});
