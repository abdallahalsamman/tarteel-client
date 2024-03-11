<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\RoleFactory;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleFactory::new()->create([
            'name' => 'admin',
            'label' => 'admin',
        ]);

        RoleFactory::new()->create([
            'name' => 'tutor',
            'label' => 'tutor',
        ]);

        RoleFactory::new()->create([
            'name' => 'parent',
            'label' => 'parent',
        ]);

        RoleFactory::new()->create([
            'name' => 'student',
            'label' => 'student',
        ]);
    }
}
