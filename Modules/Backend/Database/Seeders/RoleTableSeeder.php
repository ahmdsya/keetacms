<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Bitfumes\Multiauth\Model\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        
        Role::create([
            'name' => 'super',
        ]);
        Role::create([
            'name' => 'editor',
        ]);
        Role::create([
            'name' => 'writer',
        ]);
    }
}
