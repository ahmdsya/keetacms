<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Artisan;

class KeetaInstallAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keeta:install-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Keeta CMS admin instalation process';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');

        $this->comment('Admin Configuration...');

        $fullname      = $this->ask('Your Full Name ');
        $email         = $this->ask('Your Valid Email ');
        $password      = $this->ask('Your Admin Password ');
        $confim_pass   = $this->ask('Confirm Your Admin Password ');

        if ($confim_pass == $password) {
            DB::table('admins')->insert([
                'name' => $fullname,
                'email' => $email,
                'password' => bcrypt($password),
                'active' => 1,
                'remember_token' => Str::random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('admin_role')->insert([
                'role_id' => 1,
                'admin_id' => 1,
            ]);
        }else{
            $this->error('Password wrong, try again !');
            die();
        }

        $this->info('Admin configuration success...');
    }
}
