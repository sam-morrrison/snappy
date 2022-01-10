<?php

namespace Database\Seeders;

use App\Helpers\Csv;
use App\Models\Agent;

class AgentsSeeder
{
    public function seed($agents)
    {
        echo "Seeding Agents...\n";

        foreach ($agents as $agent) {
            Agent::updateOrCreate($agent);
        }

        echo "Agents seeding completed...\n\n";

    }

    public function validateHeaders($headerFields)
    {
        $csv = new Csv;

        $validFields = [
            'first_name',
            'last_name',
            'phone',
            'email'
        ];

        return ($csv->validateheaders($headerFields, $validFields));
    }
}
