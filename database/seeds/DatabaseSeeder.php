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
        // factory(App\Models\User::class, 50)->create()->each(function ($u) {
        //     $u->posts()->save(factory(App\Models\Post::class)->make());
        // });


        
        // Crear los Niveles y Rangos de edad
        for($i = 1; $i <= 10; $i++){
            if($i < 6){
                DB::table('nivels')->insert([
                    'nivel' => $i,
                    'base' => 10,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }else if($i == 6){
                DB::table('nivels')->insert([
                    'nivel' => $i,
                    'base' => 16,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }else{
                DB::table('nivels')->insert([
                    'nivel' => $i,
                    'base' => 50,// No hay una base definida para niveles arriba de 6
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
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

        // Disciplinas (viga, piso, salto, barras)
        DB::table('disciplinas')->insert([
            'nombre' => "viga",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
        DB::table('disciplinas')->insert([
            'nombre' => "piso",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('disciplinas')->insert([
            'nombre' => "salto",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('disciplinas')->insert([
            'nombre' => "barras",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Crear mesas de juicio
        // factory(App\Models\MesaDeJuicio::class, 20)->create()->each(function($mesa) {
        //     factory(App\Models\Juez::class, 4)->make()->each(function($juez) use ($mesa) {
        //          $mesa->jueces()->save($juez);
        //     });
        // });





    }
}
