<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'supervisor',
            'operador',
            'sin acceso'
        ];

        foreach($roles as $role) {
            Rol::create([
                'name' => $role,
                'description' => $role
            ]);
        }
    }
}
