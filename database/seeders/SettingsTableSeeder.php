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
            'about_us' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nis',
            'address_line_1' => '1234 Main St',
            'address_line_2' => 'Apartment 1',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip_code' => '10001',
            'contact_number' => '123-456-7890',
            'contact_description' => 'Call us',
            'contact_email' => 'test@gmail.com',
            'email_description' => 'Email us',
        ]);
    }
}
