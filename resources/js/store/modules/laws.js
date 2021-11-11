import http from "@/libs/axios"
import api from '@/api'

export default {
    namespaced: true,

    state: {
        laws: {
            total: 1,
            data: [],
        }
    },

    getters: {
        getLaws: state => state.laws,
    },

    mutations: {
        setLaws: (state, laws) => {
            state.laws = laws;
        },
    },

    actions: {
        async getLaws({commit}, page = 1) {
            const response = await http.get(api.laws.index + '?page=' + page);

            commit('setLaws', response.data.laws);
        },
    }
}
