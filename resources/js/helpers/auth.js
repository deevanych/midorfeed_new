import store from '../store/index.js';

export default {
    methods: {
        authCheck: function() {
            return (store.getters.getAuthUser ? true : false);
        }
    }
};
