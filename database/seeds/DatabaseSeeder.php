<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 Users
        // factory(App\User::class, 50)->create()->each(function ($u) {
        //     $u->posts()->save(factory(App\Post::class)->make());
        // });

        // Crea 50 gimnastas de prueba
        // al crear cada gimnasta, tambien se crea un nuevo gimnasio
        // factory(App\Gimnasta::class, 50)->create();
        
        // Crear los Niveles y Rangos de edad
        for($i = 1; $i <= 10; $i++){
            DB::table('nivels')->insert([
                'nivel' => $i,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        // Rangos son: 6-7, 8-9, 10-12, 13-15, 16+
        DB::table('rangos')->insert([
            'rango' => "6-7",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            
        ]);
        DB::table('rangos')->insert([
            'rango' => "8-9",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('rangos')->insert([
            'rango' => "10-12",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('rangos')->insert([
            'rango' => "13-15",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('rangos')->insert([
            'rango' => "16+",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
