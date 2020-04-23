<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Artisan;

class KeetaInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keeta:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Keeta CMS instalation process';

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
        Artisan::call('key:generate');

        $this->comment('Welcome : Keeta CMS ...');
        
        $this->comment('Database Configuration...');

        $dbname = $this->ask('Database Name ');
        $dbuser = $this->ask('Database Username ');
        $dbpass = $this->ask('Database Password (leave for no password)');
        $appurl = $this->ask('App URL (http://localhost/keetacms)');

        EnvSet([
            'DB_DATABASE' => $dbname,
            'DB_USERNAME' => $dbuser,
            'DB_PASSWORD' => $dbpass,
            'APP_URL' => $appurl,
        ]);

        Artisan::call('migrate');
        Artisan::call('module:seed Backend');

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

        $this->info('Instalation success.');
        $this->comment('Now you can access the admin page on '.$appurl.'/admin with login information :');
        $this->comment('Email : '.$email);
        $this->comment('Password : '.$password);
    }
}
