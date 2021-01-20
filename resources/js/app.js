require('./bootstrap');
import '@fortawesome/fontawesome-free/js/all.js'
import Vue from 'vue';
import App from './components/app';

const app = new Vue({
    el: '#app',
    components: {App}
})
