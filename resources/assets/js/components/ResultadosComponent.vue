<template>
        <tr v-if="resultados"> <!-- Avoid console errors by waiting until the object has loaded -->
            <td>{{resultados.gimnasta.nombre}}</td>
            <td>{{resultados.gimnasta.id}}</td>
            <td>{{resultados.gimnasio.nombre}}</td>
            <td>{{resultados.promedios.viga}}</td>
            <td>{{resultados.promedios.piso}}</td>
            <td>{{resultados.promedios.salto}}</td>
            <td>{{resultados.promedios.barras}}</td>
            <td>{{resultados.promedios.AA}}</td>
        </tr>
</template>

<script>

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