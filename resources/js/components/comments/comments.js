import Vue from 'vue';
import Comments from './Comments.vue';
import Vuesax from 'vuesax';

Vue.use(Vuesax);

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
