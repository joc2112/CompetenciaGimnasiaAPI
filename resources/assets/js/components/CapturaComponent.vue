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
                        <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Añadir Juez</span></a>
                        <div id="datatable_button_stack" class="pull-right text-right"></div>
                        </div>
                    </div>
                    </div>
                    <div class="row" v-for="juez in jueces">
                        <div class="col-xs-10">
                            <span> {{ juez.name }}</span>
                        </div>
                        <div class="col-xs-2">
                            <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4">
                    <h3>Aparato</h3>
                    <select class="form-control">
                    <option v-for="aparato in aparatos">{{aparato}}</option>
                    </select>
                </div>
                </div>
                <hr>
                <!-- Participante/Gimansta -->
                <div class="row">
                    <div class="col-xs-12">
                    <h3>Participante</h3>
                    <select class="form-control">
                        <option v-for="gimnasta in gimnastas">{{gimnasta.name}} - {{gimnasta.gym}}</option>
                    </select>
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
                        <tr v-for="juez in jueces">
                        <td>{{juez.name}}</td>
                        <td>{{juez.calificacion}}</td>
                        </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
                <div id="app">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                aparatos: [
                    "Piso",
                    "Barra",
                    "Salto",
                    "Viga"
                ],
                gimnastas: [
                    {
                        name: "Gimnasta 1 Perez",
                        gym: "Gym super pro"
                    },
                    {
                        name: "Gimnasta 2 Sosa",
                        gym: "Gym nada pro"
                    },
                    {
                        name: "Wada duu Perez",
                        gym: "Gym Desconocido"
                    },
                ],
                jueces: [
                    {
                        name: "Pablito Perez",
                        calificacion: 13.2
                    },
                    {
                        name: "Pablito Segundo",
                        calificacion: 11.9
                    },
                    {
                        name: "Tercero Perez",
                        calificacion: 9.1
                    },
                    {
                        name: "Tercero Perez",
                        calificacion: 9.1
                    },
                    {
                        name: "Tercero Perez",
                        calificacion: 9.1
                    },
                    {
                        name: "Tercero Perez",
                        calificacion: 9.1
                    },
                    {
                        name: "Tercero Perez",
                        calificacion: 9.1
                    }
                ]
            }
        },
        mounted() {
            console.log('Componenente de Captura listo.')
        }
    }
</script>
