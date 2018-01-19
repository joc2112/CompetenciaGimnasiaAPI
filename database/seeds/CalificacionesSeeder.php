<?php

use Illuminate\Database\Seeder;

class CalificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear calificaciones
        factory(App\Models\Calificacion::class, 100)->create();        
    }
}
