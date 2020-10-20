import Vue from 'vue';
import Vuelidate from 'vuelidate'
import Comments from './Comments.vue';
import Vuesax from 'vuesax';

Vue.use(Vuesax);
Vue.use(Vuelidate);

let comments = Array,
    modelType = String,
    modelId = String;
new Vue({
    el: '#comments',
    beforeMount() {
        comments = JSON.parse(this.$el.attributes['data-comments'].value);
        modelType = this.$el.attributes['data-type'].value;
        modelId = this.$el.attributes['data-id'].value;
    },
    render: (h) => h(Comments, {
        props:
            {
                comments,
                modelType,
                modelId
            }
    })
});
