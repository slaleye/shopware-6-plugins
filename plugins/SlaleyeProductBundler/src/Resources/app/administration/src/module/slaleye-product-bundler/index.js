import './page/slaleye-product-bundler-list';
import './page/slaleye-product-bundler-detail';
import './page/slaleye-product-bundler-create';
import deDE from './snippet/de-DE';
import enGB from './snippet/en-GB';
import frFR from './snippet/fr-FR';

const MODULE_NAME = "slaleye-product-bundler";
const COMPONENT_LIST_PATH = "slaleye.product.bundler.list";

let config = {
    type: 'plugin',
    name: 'Bundle',
    color: '#ffd95e',
    icon: 'default-shopping-paper-bag-product',
    title: 'slaleye-product-bundler.general.mainMenuItemGeneral',
    description: 'slaleye-product-bundler.general.descriptionTextModule',

    snippets: {
        'de-DE': deDE,
        'en-GB': enGB,
        'fr-FR': frFR
    },

    routes: {
        list: {
            component: 'slaleye-product-bundler-list',
            path: 'list'
        },
        detail: {
            component: 'slaleye-product-bundler-detail',
            path: 'detail/:id',
            meta: {
                parentPath: COMPONENT_LIST_PATH
            }
        },
        create: {
            component: 'slaleye-product-bundler-create',
            path: 'create',
            meta: {
                parentPath: COMPONENT_LIST_PATH
            }
        },
    },
    navigation: [{
        label: 'slaleye-product-bundler.general.mainMenuItemGeneral',
        color: '#ffd95e',
        path: COMPONENT_LIST_PATH,
        icon: 'default-shopping-paper-bag-product',
        position: 100
    }]
};

Shopware.Module.register(MODULE_NAME, config);