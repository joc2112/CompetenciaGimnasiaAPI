<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
            <table class="table table-striped">
            <thead>
                <th>Tipo</th>
                <th>Gimnasta</th>
                <th>Calificacion</th>
            </thead>
            <tbody>
                <tr v-for="standing in standings">
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
        key: '67566193cf53436c2f26',
        cluster: 'us2',
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
        }
        // // Iniciar Websocket listener
        // window.Echo.channel('calificaciones')
        // .listen('CalificacionPosted', (e) => {
        //     console.log(e);
            
        // });
        // console.log(VueApp);
    }

</script>