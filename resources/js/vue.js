import Vue from 'vue';
import Vuelidate from 'vuelidate'
import Comments from './components/comments/Comments.vue';
import Vuesax from 'vuesax';
import VueRouter from 'vue-router';
import axios from 'axios';
import store from './store';

Vue.use(Vuesax);
Vue.use(Vuelidate);
Vue.use(VueRouter);


axios.get('/auth')
    .then(response => {
       store.commit('setAuthUser', response.data);
    })
    .catch(error => {

    });

Vue.component('comments', Comments);

new Vue({store}).$mount('#app');
