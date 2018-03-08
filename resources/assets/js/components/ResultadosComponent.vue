<template>
        <tr v-if="resultados"> <!-- Avoid console errors by waiting until the object has loaded -->
            <td v-if="individual">{{resultados.gimnasta.nombre}}</td>
            <td v-else><a :id="resultados.gimnasta.id" :href="link">{{resultados.gimnasta.nombre}}</a></td>
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
        props: ['gimnasta','individual'],
        data(){
            return {
                resultados: null,
                link: ""
            }
        },
        getLink(){
            return "<img>";
        },
        mounted() {
            console.log(this.gimnasta);
            // Listar las calificaciones
            axios.get('/api/calificaciones/' + this.gimnasta.id + '/promedio')
                .then(response => {
                    this.resultados = response.data;
                    this.link = "../" + this.gimnasta.id;
                })
                .catch(error => console.log(error))
        }

    }
</script>