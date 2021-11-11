import Vue from 'vue'
import axios from 'axios'

const http = axios.create({
    baseURL: `${process.env.MIX_APP_URL}` + '/api',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
    withCredentials: true,
})

Vue.prototype.$http = http

export default http
