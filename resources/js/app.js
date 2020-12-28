/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.events = new Vue()


window.noty = function (notification) {
    window.events.$emit('notification', notification)
}


window.handleErrors = function (error) {
    if (error.response.status == 422) {
        window.noty({
            message: 'You had validation errors. Please try again.',
            type: 'danger'
        })
    }

    window.noty({
        message: 'Something went wrong . Please refresh the page.',
        type: 'danger'
    })
}


Vue.component('vue-noty', require('./components/Noty.vue').default);

Vue.component('vue-login', require('./components/Login.vue').default);

Vue.component('vue-stripe', require('./components/Stripe.vue').default);

Vue.component('vue-player', require('./components/Player.vue').default);

Vue.component('vue-lessons', require('./components/Lessons.vue').default);

Vue.component('vue-update-card', require('./components/UpdateCard.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
