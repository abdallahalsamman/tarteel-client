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
            'role_id' => Role::whereName('admin')->first(),
        ]);


        UserFactory::new()->create([
            'email' => 'tutor@lte.com',
            'name' => 'Tutor User',
            'role_id' => Role::whereName('tutor')->first(),
        ]);

        UserFactory::new()->create([
            'email' => 'parent@lte.com',
            'name' => 'Parent User',
            'role_id' => Role::whereName('parent')->first(),
        ]);

        UserFactory::new()->create([
            'email' => 'student@lte.com',
            'name' => 'Student User', // Add a name to the student user to avoid 'name' column being 'null' error when trying to login as a student user.
            'role_id' => Role::whereName('student')->first(),
        ]);
    }
}
