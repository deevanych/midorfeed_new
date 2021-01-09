import Vue from 'vue';
import Vuelidate from 'vuelidate'
import Vuesax from 'vuesax';
import VueRouter from 'vue-router';
import axios from 'axios';
import store from './store';

// components
import Comments from './components/comments/Comments.vue';
import PostForm from "./components/posts/PostForm.vue";


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
Vue.component('post-form', PostForm);

new Vue({store}).$mount('#app');
