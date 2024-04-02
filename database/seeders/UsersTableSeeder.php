<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\TutoringSession;
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

        $parent = UserFactory::new()->create([
            'email' => 'parent@lte.com',
            'name' => 'Parent User',
            'role_id' => Role::whereName('parent')->first()->id,
        ]);

        for ($i = 0; $i < 5; $i++) {
            $tutor = UserFactory::new()->create([
                'email' => 'tutor' . $i . '@lte.com',
                'name' => 'Tutor User ' . $i,
                'hourly_rate' => 50,
                'role_id' => Role::whereName('tutor')->first()->id,
            ]);

            $student = UserFactory::new()->create([
                'email' => 'student' . $i . '@lte.com',
                'name' => 'Student User ' . $i,
                'parent_id' => $parent->id,
                'role_id' => Role::whereName('student')->first()->id,
            ]);

            TutoringSession::create([
                'student_id' => $student->id,
                'tutor_id' => $tutor->id,
                'session_date' => now()->addDays($i),
                'subject' => 'Math',
                'note' => 'This is a note.',
                'duration' => 45,
            ]);
        }
    }
}
