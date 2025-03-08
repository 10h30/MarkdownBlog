<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            ['key' => 'site_title', 'value' => 'Markdown Blog'],
            ['key' => 'site_description', 'value' => 'Just another blog'],
        ]);
    }
}
