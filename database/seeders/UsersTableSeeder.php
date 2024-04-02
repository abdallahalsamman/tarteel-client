<?php

namespace Database\Seeders;

use App\Models\Role;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserFactory::new()->create([
            'email' => 'admin@lte.com',
            'name' => 'Admin User',
            'role_id' => Role::whereName('admin')->first()->id,
        ]);

        UserFactory::new()->create([
            'email' => 'tutor@lte.com',
            'name' => 'Tutor User',
            'role_id' => Role::whereName('tutor')->first()->id,
        ]);

        $parent = UserFactory::new()->create([
            'email' => 'parent@lte.com',
            'name' => 'Parent User',
            'role_id' => Role::whereName('parent')->first()->id,
        ]);

        for ($i = 0; $i < 100; $i++) {
            UserFactory::new()->create([
                'email' => 'student' . $i . '@lte.com',
                'name' => 'Student User ' . $i,
                'parent_id' => $parent->id,
                'role_id' => Role::whereName('student')->first()->id,
            ]);
        }
    }
}
