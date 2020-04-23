<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Backend\Entities\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Menu::create([

                'menu' => 'Beranda',
                'link' => url('/'),
                'type' => 'Tautan',
                'parent_id' => 0,
                'sort' => 1
        ]);

        Menu::create([

                'menu' => 'About',
                'link' => url('/page/1/about'),
                'type' => 'Halaman',
                'parent_id' => 0,
                'sort' => 4

        ]);
        Menu::create([

                'menu' => 'Uncategorised',
                'link' => url('/category/uncategorised'),
                'type' => 'Kategori',
                'parent_id' => 4,
                'sort' => 3

        ]);
        Menu::create([

                'menu' => 'Category',
                'link' => '#',
                'type' => 'Tautan',
                'parent_id' => 0,
                'sort' => 2

        ]);
    }
}
