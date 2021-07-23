import axios from 'axios';
import Vue from 'vue';


window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = Vue;

window.events = new Vue();

window.flash = function(message) {
    window.Events.$emit('flash', message);
}
