import './page/slaleye-shop-finder-list';
import './page/slaleye-shop-finder-detail';
import './page/slaleye-shop-finder-create';
import enGB from './snippet/en-GB';


const MODULE_NAME = "slaleye-shop-finder";
const COMPONENT_LIST_PATH = "slaleye.shop.finder.list";

let config = {
    type: 'plugin',
    name: 'Shop Finder',
    color: '#cb9365',
    icon: 'default-building-shop',
    title: 'slaleye-shop-finder.module.titleText',
    description: 'slaleye-shop-finder.module.descriptionText',

    snippets: {
        'en-GB': enGB,
    },

    routes: {
        list: {
            component: 'slaleye-shop-finder-list',
            path: 'list'
        },
        detail: {
            component: 'slaleye-shop-finder-detail',
            path: 'detail/:id',
            meta: {
                parentPath: COMPONENT_LIST_PATH
            }
        },
        create: {
            component: 'slaleye-shop-finder-create',
            path: 'create',
            meta: {
                parentPath: COMPONENT_LIST_PATH
            }
        },
    },
    navigation: [{
        label: 'slaleye-shop-finder.module.titleText',
        color: '#cb9365',
        path: COMPONENT_LIST_PATH,
        icon: 'default-building-shop',
        position: 100
    }]
};

Shopware.Module.register(MODULE_NAME, config);