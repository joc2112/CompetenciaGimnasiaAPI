<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usar la configuracion del nombre las tablas
        $config = config('laravel-permission.table_names');

        // Crear Admin role
        DB::table($config['roles'])->insert([
            'name' => "Admin"
        ]);
        // Crear Capturista Role
        DB::table($config['roles'])->insert([
            'name' => "Capturista"
        ]);
        
        // Crear usuario Admin
        DB::table('users')->insert([
            'name' => "Mr. Admin",
            'email' => "admin@admin.com",
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
        ]);
        // Crear usuario Capturista
        DB::table('users')->insert([
            'name' => "Mrs. Capturista",
            'email' => "cap@cap.com",
            'password' => bcrypt('cap'),
            'remember_token' => str_random(10),
        ]);
        // Asignar roles a los usuarios
        // Admin
        // DB::table($config['user_has_roles'])->insert([
        //     'role_id' => 1, // Admin role es 1
        //     'user_id' => 1 // Admin user es 1
        // ]);
        // // Capturista
        // DB::table($config['user_has_roles'])->insert([
        //     'role_id' => 2, // Capturista role es 2
        //     'user_id' => 2 // Capturista user es 2
        // ]);
    }
}
