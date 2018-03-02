<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Llamar al seeder que genera torneos
        $torneo = new TorneoSeeder();
        $torneo->run();

        // Llamar al seeder que genera Datos de las competencias/torneos (niveles, rangos, etc)
        $torneos_data = new TorneoDataSeeder();
        $torneos_data->run();

        // Llamar al seeder que genera las gimnastas
        $gimnastas = new GimnastaSeeder();
        $gimnastas->run();

        // Llamar al seeder que genera calificaciones
        $calificaciones = new CalificacionesSeeder();
        $calificaciones->run();

        // Llamar al seeder que genera usuarios y roles
        $user_roles = new UserRolesSeeder();
        $user_roles->run();


    }
}
