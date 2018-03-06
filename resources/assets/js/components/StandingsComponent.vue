<template>
    <div class="container-fluid">
        <h1> Standings </h1>
        <hr>
        <div class="row">
            <div class="col-xs-12">
            <table class="table table-striped">
            <thead>
                <th>Tipo</th>
                <th>Gimnasta</th>
                <th>Calificacion</th>
            </thead>
            <tbody name="list" is="transition-group">                    
                
                <tr v-for="standing in standings" :key="standing.id">
                    <td>{{standing.disciplina.nombre}}</td>
                    <td>{{standing.gimnasta.nombre}}</td>
                    <td>{{standing.calificacion}}</td>
                </tr>
                
            </tbody>
            </table>
            </div>
        </div>
            
        <hr>
    </div>
</template>

<script>
    import Echo from "laravel-echo"
    window.Pusher = require('pusher-js');
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'bf9e48920c9693e7aea5',
        cluster: 'mt1',
    });


    export default {
        data(){
            return {
                standings: []
            }
        },
        mounted() {
            console.log('Standings funcionando');
            
            // Listar los ultimos standings
            axios.get('/api/standings')
                .then(response => {
                    this.standings = response.data;
                    console.log(this.standings);
                })
                .catch(error => console.log(error))
            
            // var channel = this.$pusher.subscribe('calificaciones');
            // var vue_ins = this;
            // channel.bind('CalificacionPosted', ({ event }) => {
            //     vue_ins.standings.push(e.calificacion);
            // });

            // Enable pusher logging - don't include this in production
            window.Pusher.logToConsole = true;

            var pusher = new Pusher('bf9e48920c9693e7aea5', {
            encrypted: true
            });

            // Iniciar Websocket listener para el monmitor de resultados
            let vue_inst = this;
            let channel = pusher.subscribe('calificaciones');
            channel.bind('App\\Events\\CalificacionPosted', function(e) {
                // console.log(e);
                // Agregar propiedades para que el componente las lea mas facil
                e.calificacion.gimnasta = e.gimnasta;
                e.calificacion.disciplina = e.disciplina;
                vue_inst.standings.unshift(e.calificacion);
            });
        }
        // // Iniciar Websocket listener
        // window.Echo.channel('calificaciones')
        // .listen('CalificacionPosted', (e) => {
        //     console.log(e);
            
        // });
        // console.log(VueApp);
    }

</script>

<style>
.list-enter-active, .list-leave-active {
  transition: all 1s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateY(30px);
}

</style>