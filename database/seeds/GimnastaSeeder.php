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
        // Crea 50 gimnastas de prueba
        // al crear cada gimnasta, tambien se crea un nuevo gimnasio
        factory(App\Models\Gimnasta::class, 50)->create();
    }
}
