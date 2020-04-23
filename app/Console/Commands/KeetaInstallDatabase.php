<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class KeetaInstallDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keeta:install-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Keeta CMS database instalation process';

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

        $this->comment('Database Configuration...');

        $dbname = $this->ask('Database Name ');
        $dbuser = $this->ask('Database Username ');
        $dbpass = $this->ask('Database Password (leave for no password)');

        EnvSet([
            'DB_DATABASE' => $dbname,
            'DB_USERNAME' => $dbuser,
            'DB_PASSWORD' => $dbpass,
        ]);

        Artisan::call('migrate');
        Artisan::call('module:seed Backend');

        $this->comment('Database configuration success...');
    }
}
