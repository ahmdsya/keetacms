<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BackendDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            ArtikelTableSeeder::class,
            HalamanTableSeeder::class,
            KategoriTableSeeder::class,
            KomentarTableSeeder::class,
            MenuTableSeeder::class,
            PengaturanTableSeeder::class,
            RoleTableSeeder::class,
            TemaTableSeeder::class,
        ]);
    }
}
