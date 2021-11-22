import VideosList from "./components/VideosList";
import Alpine from 'alpinejs';
import casteaching from 'casteaching'
import Vue from 'vue'

require('./bootstrap');

window.Alpine = Alpine;
window.casteaching = casteaching;
window.Vue = Vue

window.Vue.component('videos-list', VideosList )
Alpine.start();

const app = new window.Vue({
    el: '#app',
});
