<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;
class TorneoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'id' => "1",
            'nombre' => "viga",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 
        DB::table('disciplinas')->insert([
            'id' => "2",
            'nombre' => "piso",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('disciplinas')->insert([
            'id' => "3",
            'nombre' => "salto",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('disciplinas')->insert([
            'id' => "4",
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
