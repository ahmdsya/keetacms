<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Backend\Entities\Kategori;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Kategori::create([
            'nama' => 'Uncategorised',
            'slug' => 'uncategorised',
            'deskripsi' => 'Tidak berkategori.'
        ]);
    }
}
