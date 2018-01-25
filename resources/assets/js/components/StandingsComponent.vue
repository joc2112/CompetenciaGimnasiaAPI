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
                <td>{{standing.aparato}}</td>
                <td>{{standing.nombre}}</td>
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
        key: '67566193cf53436c2f26'
    });
    export default {
        data(){
            return {
                standings: [
                    {
                        aparato: "viga",
                        nombre: "Cami Rodriguez Sanchez",
                        calificacion: 12
                    },
                    {
                        aparato: "piso",
                        nombre: "Furi Wat Esteban",
                        calificacion: 15
                    },
                    {
                        aparato: "salto",
                        nombre: "Estefania Dominguez",
                        calificacion: 4
                    }
                ]
            }
        },
        mounted() {
            console.log('Standings funcionando');
            // Listar los ultimos standings
            axios.get('/api/standings')
                .then(response => this.standings = response.data)
                .catch(error => console.log(error))
        }

    }
</script>