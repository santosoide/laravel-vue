
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router'


window.Vue = require('vue');

Vue.use(VueRouter)


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sidebar-component', require('./components/Sidebar.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './components/App'
import Hello from './components/Hello'
import Home from './components/Home'
import UsersIndex from './components/UsersIndex'
import UserCreate from './components/UserCreate'
import UserEdit from './components/UserEdit'
import Channels from './components/ChannelsIndex'
import ChannelCreate from './components/ChannelCreate'
import ChannelEdit from './components/ChannelEdit'
import RolesIndex from './components/RolesIndex'
import RoleCreate from './components/RoleCreate'
import RoleEdit from './components/RoleEdit'
import CustomersIndex from './components/CustomersIndex'
import CustomerCreate from './components/CustomerCreate'
import CustomerEdit from './components/CustomerEdit'

import SubscribersIndex from './components/SubscribersIndex'
import SubscriberCreate from './components/SubscriberCreate'
import SubscriberEdit from './components/SubscriberEdit'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex,
        },
        {
            path: '/users/create',
            name: 'users.create',
            component: UserCreate,
        },
        {
            path: '/users/:id/edit',
            name: 'users.edit',
            component: UserEdit,
        },
        {
            path: '/channels',
            name: 'channels.index',
            component: Channels,
        },
        {
            path: '/channels/create',
            name: 'channels.create',
            component: ChannelCreate,
        },
        {
            path: '/channels/:id/edit',
            name: 'channels.edit',
            component: ChannelEdit,
        },
        {
            path: '/roles',
            name: 'roles.index',
            component: RolesIndex,
        },
        {
            path: '/roles/create',
            name: 'roles.create',
            component: RoleCreate,
        },
        {
            path: '/roles/:id/edit',
            name: 'roles.edit',
            component: RoleEdit,
        },
        {
            path: '/customers',
            name: 'customers.index',
            component: CustomersIndex,
        },
        {
            path: '/customers/create',
            name: 'customers.create',
            component: CustomerCreate,
        },
        {
            path: '/customers/:id/edit',
            name: 'customers.edit',
            component: CustomerEdit,
        },
        {
            path: '/subscriber',
            name: 'subscribers.index',
            component: SubscribersIndex,
        },
        {
            path: '/subscriber/create',
            name: 'Subscriber.create',
            component: SubscriberCreate,
        },
        {
            path: '/subscriber/:id/edit',
            name: 'Subscriber.edit',
            component: SubscriberEdit,
        },

    ],
});

let vm = new Vue({
    el: '#app',
    components: { App },
    router,
});
global.vm = vm; //Define you app variable globally
