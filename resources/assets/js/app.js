window._ = require('lodash');

window.Vue = require('vue');

// require ('./components');

window.axios = require('axios');

Vue.component('contact-us', require('./components/ContactUs'));

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en';

Vue.use(ElementUI, { locale });

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let app = new Vue({
    el: '#app'
});