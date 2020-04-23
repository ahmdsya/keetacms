<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Backend\Entities\Pengaturan;

class PengaturanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Pengaturan::create([
                'key' => 'app_name',
                'value' => 'KeetaCMS',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'web_tittle',
                'value' => 'My Personal Web Blog',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'web_url',
                'value' => 'http://localhost/keetacms',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'web_description',
                'value' => 'Just my personal web blog',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'web_keyword',
                'value' => 'keyword 1, keyword 2',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'author',
                'value' => 'Keeta CMS',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'email',
                'value' => 'keeta@cms.com',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'phone',
                'value' => '08123456789',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'address',
                'value' => 'Kota Medan, Sumatera Utara',
                'group' => 'general'
            ]);
        Pengaturan::create([
                'key' => 'show_post_per_page',
                'value' => '4',
                'group' => 'post'
            ]);
        Pengaturan::create([
                'key' => 'show_comment',
                'value' => 'Y',
                'group' => 'comment'
            ]);
        Pengaturan::create([
                'key' => 'show_comment_per_page',
                'value' => '7',
                'group' => 'comment'
            ]);
        Pengaturan::create([
                'key' => 'mail_port',
                'value' => '2525',
                'group' => 'email'
            ]);
        Pengaturan::create([
                'key' => 'mail_host',
                'value' => 'smtp.mailtrap.io',
                'group' => 'email'
            ]);
        Pengaturan::create([
                'key' => 'mail_protocol',
                'value' => 'smtp',
                'group' => 'email'
            ]);
        Pengaturan::create([
                'key' => 'mail_username',
                'value' => 'keeta@cms.com',
                'group' => 'email'
            ]);
        Pengaturan::create([
                'key' => 'mail_password',
                'value' => 'mail_password',
                'group' => 'email'
            ]);
        Pengaturan::create([
                'key' => 'web_favicon',
                'value' => 'favicon.ico',
                'group' => 'icon'
            ]);
        Pengaturan::create([
                'key' => 'web_logo',
                'value' => 'logo.png',
                'group' => 'icon'
            ]);
    }
}
