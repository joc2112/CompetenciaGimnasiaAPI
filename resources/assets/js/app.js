
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

const VueApp = new Vue({
    el: '#app'
});

// Iniciar Websocket listener para el monmitor de resultados
window.Echo.channel('calificaciones')
.listen('App\Events\CalificacionPosted', (e) => {
    // console.log(e);
    // Agregar propiedades para que el componente las lea mas facil
    e.calificacion.gimnasta = e.gimnasta;
    e.calificacion.disciplina = e.disciplina;
    // Agrregar al inicio del array (TODO BETTER)
    let standings_component = VueApp.$children[0];
    standings_component.standings.unshift(e.calificacion);
});

