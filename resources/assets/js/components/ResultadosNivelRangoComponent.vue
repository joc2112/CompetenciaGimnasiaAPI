<template>
    <div class="container-fluid">
    </div>
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