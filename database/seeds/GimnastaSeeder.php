<?php

use Illuminate\Database\Seeder;

class GimnastaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 75 gimnastas de prueba
        // al crear cada gimnasta, tambien se crea un nuevo gimnasio
        factory(App\Models\Gimnasta::class, 75)->create()->each(function($gimnasta) {
            // Asginar un numero aleatorio de torneos aleatorios
            // TODO: eliminar suceptible a repeticion
            $max_torneos = App\Models\Torneo::count();
            $rand_count = rand(1,$max_torneos);
            for($i = 0; $i < $rand_count; $i++){
                $torneo = App\Models\Torneo::all()->random();
                $gimnasta->torneos()->save($torneo);
            }
            
        });
    }
}
