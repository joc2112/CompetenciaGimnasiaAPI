<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
            <table class="table table-striped">
            <thead>
                <th>Gimnasta</th>
                <th>ID</th>
                <th>Gimnasio</th>
                <th>Viga</th>
                <th>Piso</th>
                <th>Salto</th>
                <th>Barras</th>
                <th>All Around</th>

            </thead>
            <tbody>
                <tr>
                <td>{{resultados.gimnasta.nombre}}</td>
                <td>{{resultados.gimnasta.id}}</td>
                <td>{{resultados.gimnasio.nombre}}</td>
                <td>{{resultados.promedios.viga}}</td>
                <td>{{resultados.promedios.piso}}</td>
                <td>{{resultados.promedios.salto}}</td>
                <td>{{resultados.promedios.barras}}</td>
                <td>{{resultados.promedios.AA}}</td>
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
        props: ['gimnasta'],
        data(){
            return {
                resultados: null
            }
        },
        mounted() {
            console.log('Standings funcionando');
            console.log(this.gimnasta);
            // Listar las calificaciones
            axios.get('/api/calificaciones/' + this.gimnasta.id + '/promedio')
                .then(response => this.resultados = response.data)
                .catch(error => console.log(error))
        }

    }
</script>