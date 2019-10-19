require('./bootstrap');
import router from './router';
import store from 'vuex';
import App from './App.vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en'
import mixin from './mixin'
window.Vue = require('vue');
window.Bus = new Vue({name: 'Bus'});

Vue.use(ElementUI, {locale});
Vue.mixin(mixin);
Vue.component('main-app', App)
const app = new Vue({
    router,
    store,
    el: '#app',
});
