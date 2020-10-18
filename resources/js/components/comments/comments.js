import Vue from 'vue';
import Comments from './Comments.vue';
import Vuesax from 'vuesax';

Vue.use(Vuesax);

let comments = '';
new Vue({
    el: '#comments',
    beforeMount() {
        comments = JSON.parse(this.$el.attributes['data-comments'].value);
    },
    render: (h) => h(Comments, {
        props:
            {
                comments: comments,
            }
    })
});
