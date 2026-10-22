<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new User;
        $a->name = "Leo";
        $a->email = "leo@example.com";
        $a->password = bcrypt("password");
        $a->save();
        User::factory()->count(10)->create();
    }
}
