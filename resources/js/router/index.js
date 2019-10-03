import Vue from 'vue';
import Router from 'vue-router';
import Home from '../pages/Home';
import Settings from '../pages/Settings';
import NotFound from '../pages/NotFound';
import Order from '../pages/Order';
import Auth from '../service/auth-service';

Vue.use(Router);

export const router = new Router({
    linkActiveClass: 'active',
    mode: 'history',
    scrollBehavior: function(to, from, savedPosition) {
        if (to.hash) {
            return {selector: to.hash}
        } else {
            return { x: 0, y: 0 }
        }
    },
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/order',
            name: 'Order',
            component: Order
        },
        {
            path: '/order/:id',
            name: 'Order status',
            component: Order,
            meta: { requiresAuth: true }
        },
        {
            path: '/settings',
            name: 'Settings',
            component: Settings,
            meta: { requiresAuth: true }
        },
        {
            path: '*',
            name: 'Not found',
            component: NotFound,
        }
    ]
});

// Set meta title
router.beforeEach((to, from, next) => {
    // change name.route to Name route
    let name = to.name.split('.').join(' ');
    name = name.charAt(0).toUpperCase() + name.slice(1);

    document.title = 'MixMakr | ' + name;
    next();
});

// Check auth
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth) && Auth.isLoggedIn() === false) {
        next('/order');
    }
    next();
});

// Check auth guest
router.beforeEach((to, from, next) => {
    if (to.meta.requiresGuest && Auth.isLoggedIn() === true) {
        next('/');
    }
    next();
});