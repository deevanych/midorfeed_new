import Vue from 'vue';
import Vuelidate from 'vuelidate'
import Comments from './comments/Comments.vue';
import Vuesax from 'vuesax';
import VueRouter from 'vue-router';

Vue.use(Vuesax);
Vue.use(Vuelidate);
Vue.use(VueRouter);

Vue.component('comments', Comments);

new Vue().$mount('#app');
