<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aidan Clark',
            'email' => 'aidanclark57@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        Profile::create([
            'user_id' => 1,
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nis',
            'facebook' => 'https://facebook.com',
            'youtube' => 'https://youtube.com',
        ]);
    }
}