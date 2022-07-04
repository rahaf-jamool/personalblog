<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class migrateWithSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate and Seed the database with records';

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
     * @return int
     */
    public function handle()
    {
        $confirm = $this->confirm ('Are you sure you want to make a migrate and seeder for tables?');
        if ($confirm){
            Artisan::call('migrate:refresh');
            Artisan::call ('db:seed');
            $this->info("Database migrate and seeding completed successfully.");
        }
        
    }
}
