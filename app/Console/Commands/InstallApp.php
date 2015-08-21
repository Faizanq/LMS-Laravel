<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Pingpong\Modules\Facades\Module;

class InstallApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hace una migración y ejecuta los seeders de la aplicación';

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
    public function handle() {

        $modules = Module::all();
        $this->call('key:generate');
        $this->call('migrate');
        $this->call('db:seed');
        $this->call('module:migrate');
        $this->call('countries:migration');

        foreach($modules as $module)

        $this->call('module:seed', ['module' => $module->name]);
    }
}
