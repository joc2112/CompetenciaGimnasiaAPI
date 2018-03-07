<template>
    <div class="container-fluid">
        <h1> Monitor de todas las últimas calificaciones </h1>
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

h1{
  font-size: 30px;
  color: #030;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  color: #066   ;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  color: #000;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


</style>