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
            'label' => 'مدير النظام',
        ]);

        RoleFactory::new()->create([
            'name' => 'tutor',
            'label' => 'مدرس',
        ]);

        RoleFactory::new()->create([
            'name' => 'parent',
            'label' => 'ولي أمر',
        ]);

        RoleFactory::new()->create([
            'name' => 'student',
            'label' => 'تلميذ',
        ]);
    }
}
