<?php

use Illuminate\Database\Seeder;

class TorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear Solo un torneo de prueba
        factory(App\Models\Torneo::class, 1)->create();
        
    }
}
