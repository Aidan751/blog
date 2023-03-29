<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'Laravel Blog',
            'address' => '123 Main St',
            'contact_number' => '555-555-5555',
            'contact_email' => 'test@gmail.com'
        ]);
    }
}