<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('name', 'admin')->first();
        $tutor = Role::where('name', 'tutor')->first();
        $student = Role::where('name', 'student')->first();

        $a = new User;
        $a->name = 'Leo';
        $a->email = 'leo@example.com';
        $a->password = bcrypt('password');
        $a->role_id = $admin->id;
        $a->save();
        Profile::factory()->for($a)->create();

        User::factory()->has(Profile::factory(), 'profile')->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => $tutor->id,
        ]);

        User::factory()->count(4)->has(Profile::factory(), 'profile')->create(['role_id' => $tutor->id]);
        User::factory()->count(10)->has(Profile::factory(), 'profile')->create(['role_id' => $student->id]);
    }
}
