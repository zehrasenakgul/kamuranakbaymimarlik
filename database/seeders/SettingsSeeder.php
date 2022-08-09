<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingArr = [
            [
                'key' => 'title',
                'value' => 'Moneo Laravel Case | BookStore',
            ],
            [
                'key' => 'description',
                'value' => 'Moneo Laravel Case | BookStore',
            ],
            [
                'key' => 'author',
                'value' => 'Zehra Sena Akgül',
            ],
        ];

        DB::table('settings')->insert($settingArr);
    }
}
