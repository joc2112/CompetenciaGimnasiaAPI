
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Componente de captura de calificaciones
import CapturaComponent from './components/CapturaComponent.vue';
Vue.component('captura-component', CapturaComponent);

// Componente de los standings
import StandingsComponent from './components/StandingsComponent.vue';
Vue.component('standings-component', StandingsComponent);

// Componente de los resultados
import ResultadosComponent from './components/ResultadosComponent.vue';
Vue.component('resultados-component', ResultadosComponent);

// Componente del vue select
import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

const app = new Vue({
    el: '#app'
});