<?php

use Illuminate\Database\Seeder;
use App\{User, Person};
use Illuminate\Support\Facades\Hash;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['Admin', 'admin@gmail.com', 'admin', 1],
            ['Test', 'test@gmail.com', 'test', 4]
        ];

        foreach($users as $user) {
            User::create([
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make($user[2]),
                'rol_id' => $user[3]
            ]);
        }

        Person::create([
            'name' => 'test',
            'surname' => 'test apellido',
            'code' => md5('test@gmail.com'),
            'adress' => 'Caracas',
            'phone_number' => '0414131584',
            'user_id' => 2,
            'gruop_id' => 4
        ]);

    }
}
