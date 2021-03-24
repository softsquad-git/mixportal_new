require('./bootstrap');
require('./custom')
window.Vue = require('vue');

import CKEditor from 'ckeditor4-vue';

Vue.use(CKEditor);

import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)
import VueFacebookPage from 'vue-facebook-page'
Vue.use(VueFacebookPage)
import VueGmaps from 'vue-gmaps'
Vue.use(VueGmaps, {
    key: 'AIzaSyDI_jGXlQWPpqJCKXXhzHjXsuQn7NkFdPU'
})
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-advert-form-component', require('./components/user/adverts/UserAdvertFormComponent').default);
Vue.component('right-facebook-widget', require('./components/RightFacebookWidget').default);
Vue.component('front-ads-list', require('./components/FrontAdsList').default);

const app = new Vue({
    el: '#app',
});
