window._ = require('lodash');
import Vue from 'vue';
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

Vue.prototype.$axios = window.axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';