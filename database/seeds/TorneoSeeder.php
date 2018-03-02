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
        // Crear multiples torneos
        factory(App\Models\Torneo::class, 5)->create();
        
    }
}
