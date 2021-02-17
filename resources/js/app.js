require('./bootstrap');

window.Vue = require('vue');

import CKEditor from 'ckeditor4-vue';

Vue.use(CKEditor);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-advert-form-component', require('./components/user/adverts/UserAdvertFormComponent').default);
Vue.component('right-facebook-widget', require('./components/RightFacebookWidget').default);


const app = new Vue({
    el: '#app',
});
