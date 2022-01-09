<?php

namespace Database\Seeders;

use App\Models\Agent;

class AgentsSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function seed($agents)
    {
        foreach ($agents as $agent) {
            Agent::updateOrCreate($agent);
        }
    }

    public function validateHeaders($headerFields)
    {
        $validFields = [
            'first_name',
            'last_name',
            'phone',
            'email'
        ];

        foreach($headerFields as $headerField) {
            if (!in_array($headerField, $validFields)) {
                echo "\nInvalid header - {$headerField} \n\n";
                return;
            }
        }
    }

}
