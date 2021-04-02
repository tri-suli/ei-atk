<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
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
        UserProfile::factory()->createMany([
            ['user_id' => User::factory(['name' => 'root']), 'role' => 'root', 'avatar_path' => 'user.png'],
            ['user_id' => User::factory(['name' => 'admin']), 'role' => 'admin', 'avatar_path' => 'user.png'],
        ]);
    }
}
