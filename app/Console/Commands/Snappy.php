<?php

namespace App\Console\Commands;

use App\Helpers\Seeder;
use Database\Seeders\AgentsSeeder;
use Database\Seeders\PropertiesSeeder;
use Illuminate\Console\Command;

class Snappy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'snappy:seed {seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $seeder = new Seeder();
        $seeder->seed('PropertiesSeeder');

        $seed = $this->argument('seed');
        $validSeeds = ['all', 'properties', 'agents', 'links'];

        if (!in_array($seed, $validSeeds)){
            echo "Unknown option - {$seed}\n";
            echo"Please try again Valid options are - 'all', 'properties', 'agents', 'links'\n";
            return 0;
        }

        if ($seed == 'all') {
            $this->seedProperties();
            $this->seedAgents();
//            $this->seedLinks();
            return 0;
        }

        if ($seed == 'properties') {
            $this->seedProperties();
            return 0;
        }

        if ($seed == 'agents') {
            $this->seedAgents();
            return 0;
        }

        return 0;
    }

    public function seedProperties()
    {
        $propertiesSeeder = new PropertiesSeeder;
        $propertiesSeeder->run();
    }

    public function seedAgents()
    {
        $agentsSeeder = new AgentsSeeder();
        $agentsSeeder->run();
    }
}
