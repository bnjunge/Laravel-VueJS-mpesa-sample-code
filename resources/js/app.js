require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './router'

// Vue.component('home-setting', require('./components/Setting.vue').default)
Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
