import Vue from 'vue'
import Vuex from 'vuex'

// Modules
import Laws from './modules/laws'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Laws
    }
})
