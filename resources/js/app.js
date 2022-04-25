/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import store from './store/index';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('test-component', require('./components/TestComponent.vue').default);

Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('head-area-component', require('./components/HeadAreaComponent.vue').default);
Vue.component('properties-component', require('./components/PropertiesComponent.vue').default);
Vue.component('step-footer-component', require('./components/StepFooterComponent.vue').default);
Vue.component('step-header-component', require('./components/StepHeaderComponent.vue').default);
Vue.component('file-component', require('./components/FileComponent.vue').default);
Vue.component('address-component', require('./components/AddressComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('home-contact-component', require('./components/HomeContactComponent.vue').default);

// APARTMENT
Vue.component('apartment-component', require('./components/apartment/StepOneComponent.vue').default);

//HOUSE
Vue.component('house-component', require('./components/house/StepOneComponent.vue').default);

// MULTI APARTMENT HOUSE
Vue.component('multi-apartment-house-component', require('./components/multiApartmentHouse/StepOneComponent.vue').default);

// BUSINESS
Vue.component('business-component', require('./components/business/StepOneComponent.vue').default);

//PROPERTY
Vue.component('property-component', require('./components/property/StepOneComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app', store
});
