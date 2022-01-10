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

    protected $seeder;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->seeder = new Seeder();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $seed = strtolower($this->argument('seed'));
        $validSeeds = ['all', 'properties', 'agents', 'links'];

        if (!in_array($seed, $validSeeds)){
            echo "Unknown option - {$seed}\n";
            echo"Please try again. Valid options are - 'all', 'properties', 'agents', 'links'\n";
            return;
        }

        switch ($seed){
            case 'all':
                $this->seedProperties();
                $this->seedAgents();
                $this->seedLinks();
            case 'properties':
                $this->seedProperties();
            case 'agents':
                $this->seedAgents();
            case 'links':
                $this->seedLinks();
        }
    }

    public function seedProperties()
    {
        $this->seeder->seed('PropertiesSeeder', 'properties');
    }

    public function seedAgents()
    {
        $this->seeder->seed('AgentsSeeder', 'agents');
    }

    public function seedLinks()
    {
        $this->seeder->seed('LinksSeeder', 'links');
    }
}
