<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Backend\Entities\Comment;

class KomentarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Comment::create([

                'parent' => 0,
                'post_id' => 1,
                'nama' => 'Ahmad Syarif',
                'email' => 'ahmad.syarif@uinsu.ac.id',
                'website' => 'www.google.com',
                'content' => 'Komentar level 1',
                'publikasi' => 1
            ]);

        Comment::create([
                'parent' => 1,
                'post_id' => 1,
                'nama' => 'Syarif Ahmad',
                'email' => 'ahmad.syarif@uinsu.ac.id',
                'website' => 'www.google.com',
                'content' => 'Komentar level 2',
                'publikasi' => 1
        ]);
    }
}
