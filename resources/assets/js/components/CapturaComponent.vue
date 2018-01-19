<template>
    <div class="container-fluid">
        <h1> Captura de Calificaciones </h1>
        <div class="box">
            <div class="box-header with-border">
                <!-- Jueces y Aparato -->
                <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="row">
                    <div class="col-xs-6">
                        <h3>Jueces</h3>
                    </div>
                    <div class="col-xs-2">
                        <div class="box-header with-border">
                        <!-- Trigger de modal -->
                        <button type="button" class="btn btn-primary ladda-button" data-toggle="modal" data-target="#agregar_juez">
                            <span class="ladda-label"><i class="fa fa-plus"></i> Modificar/Añadir Jueces </span>
                        </button>
                        
                        <div id="datatable_button_stack" class="pull-right text-right"></div>
                        </div>
                    </div>
                    </div>
                    <div class="row" v-for="juez in jueces_activos">
                        <div class="col-xs-10">
                            <span> {{ juez.nombre }}</span>
                        </div>
                        <div class="col-xs-2">
                            <a href="#" @click="removeJuez(juez)" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4">
                    <h3>Aparato</h3>
                    <select class="form-control">
                    <option v-for="aparato in aparatos" v-model="aparato_selected">{{aparato.nombre}}</option>
                    </select>
                </div>
                </div>
                <hr>
                <!-- Participante/Gimansta -->
                <div class="row">
                    <div class="col-xs-12">
                    <h3>Participante</h3>
                    
                    <v-select v-model="gimnasta_selected" :options="gimnastas" label="nombre">
                    </v-select>
                    </div>
                </div>
                <hr>
                <!-- Calificaciones -->
                <div class="row">
                    <div class="col-xs-12">
                    <table class="table table-striped">
                    <thead>
                        <th>Juez</th>
                        <th>Calificacion</th>
                    </thead>
                    <tbody>
                        <tr v-for="calificacion in calificaciones">
                        <td>{{calificacion.juez.nombre}}</td>
                        <td>{{calificacion.calificacion}}</td>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para agregar juez-->
        <div class="modal fade" id="agregar_juez" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modificar/Añadir Jueces</h4>
            </div>
            <div class="modal-body">
                <div class="row" v-for="juez in jueces_activos">
                    <div class="col-xs-10">
                        <span> {{ juez.nombre }}</span>
                    </div>
                    <div class="col-xs-2">
                        <a href="#" @click="removeJuez(juez)" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
                    </div>
                </div>
                <hr>
                <v-select v-model="juez_selected" :options="jueces" label="nombre">
                </v-select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" @click="choose_juez">Agregar Juez seleccionado</button>
            </div>
            </div>
        </div>
        </div>
</div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                aparatos: [],
                gimnastas: [],
                gimnasta_selected: null,
                aparato_selected: null,
                calificaciones: [],
                jueces: [],
                jueces_activos: [],
                juez_selected: null
            }
        },
        mounted() {
            // Listar las gimnastas
            axios.get('/api/gimnastas')
                .then(response => this.gimnastas = response.data)
                .catch(error => console.log(error))
            // Listar los jueces
            axios.get('/api/jueces')
                .then(response => this.jueces = response.data)
                .catch(error => console.log(error))
            // Listar los aparatos
            axios.get('/api/disciplinas')
                .then(response => this.aparatos = response.data)
                .catch(error => console.log(error))
            
            console.log('Componenente de Captura listo.')
        },
        methods: {
            choose_juez(){
                console.log("New juez selected");
                if(this.juez_selected != null){
                    this.jueces_activos.push(this.juez_selected);
                }
            },
            removeJuez(juez){
                console.log(juez);
                // Find juez in array of current 
                var index = this.jueces_activos.indexOf(juez);
                console.log(index);
                if(index > -1){
                    this.jueces_activos.splice(index, 1);
                }

            }
        },
        watch:{
            // Cada vez que se seleccione una nueva gimnasta se obtienen sus calificaciones
            gimnasta_selected(){
                console.log("Cambioo de gimnasta");
                // Obtener y filtrar calificaciones solo del aparato seleccionado
                axios.get('/api/calificaciones/' + this.gimnasta_selected.id)
                    .then(response => this.calificaciones = response.data)
                    .catch(error => console.log(error))
                // TODO FILTRAR POR APARATO SELECCIONADO
            }
        }
        
    }
</script>
