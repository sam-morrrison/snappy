<?php
declare(strict_types=1);
namespace App\Console\Commands;

use App\Helpers\Seeder;
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

        $this->seeder = app()->make(Seeder::class);
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

        echo "Seed = {$seed}\n";

        switch ($seed){
            case 'all':
                $this->seedProperties();
                $this->seedAgents();
                $this->seedLinks();
                break;
            case 'properties':
                $this->seedProperties();
                break;
            case 'agents':
                $this->seedAgents();
                break;
            case 'links':
                $this->seedLinks();
                break;
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
