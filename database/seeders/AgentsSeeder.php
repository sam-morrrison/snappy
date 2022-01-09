<?php

namespace Database\Seeders;

use App\Models\Agent;
use League\Csv\Reader;

class AgentsSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        dd("AGENT SEEDER");
        $properties = [];
        $allowedFields = [
            'first_name',
            'last_name',
            'phone',
            'email'
        ];

        $seedFileLocation = storage_path("seeds/agents.csv");

        if (!file_exists($seedFileLocation)) {
            echo "\nThe input file does not exist at the location given. {$seedFileLocation} \n";
            return 1;
        }

        $seedFile = Reader::createFromPath($seedFileLocation);

        $headerFields = $seedFile->fetchOne();
        foreach($headerFields as $headerField) {
            if (!in_array($headerField, $allowedFields)) {
                echo "\nInvalid header - {$headerField} - Please check the contents of seeds/agents.csv \n\n";
                return 1;
            }
        }

        $seedFile->setHeaderOffset(0);

        foreach ($seedFile->getRecords() as $agentData) {
            $agents[] = $agentData;
        }

        foreach ($agents as $agent) {
            Agent::updateOrCreate($agent);
        }
    }
}
