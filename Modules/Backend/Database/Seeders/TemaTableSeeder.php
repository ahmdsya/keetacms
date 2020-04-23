<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Backend\Entities\Tema;

class TemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Tema::create([
                'nama' => 'newspaper',
                'status' => 0,
                'screenshot' => 'Themes/newspaper/screenshot.png'
        ]);
        Tema::create([
                'nama' => 'serenity',
                'status' => 1,
                'screenshot' => 'Themes/serenity/screenshot.png'
        ]);
    }
}
