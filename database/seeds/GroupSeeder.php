<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            'deposito',
            'cajera',
            'profesionales',
            'mantenimiento',
            'markenting',
            'atención al cliente'
        ];

        foreach($groups as $group) {
            Group::create([
                'name' => $group,
                'description' => $group
            ]);
        }
    }
}
