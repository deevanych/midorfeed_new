import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: false,
    },
    getters: {
        getAuthUser: (state) => {
            return state.user;
        }
    },
    mutations: {
        setAuthUser (state, data) {
            state.user = data;
        }
    }
})
