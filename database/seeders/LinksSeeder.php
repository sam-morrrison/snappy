<?php

namespace Database\Seeders;

use App\Helpers\Csv;
use App\Models\Link;
use Illuminate\Support\Facades\DB;

class LinksSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function seed($links)
    {
        foreach ($links as $link) {
            DB::table('agent_property')->updateOrInsert($link);
        }

        echo "\nLinks seeding completed...\n";

    }

    public function validateHeaders($headerFields)
    {
        $csv = new Csv;

        $validFields = [
            'agent_id',
            'property_id',
            'role'
        ];

        return ($csv->validateheaders($headerFields, $validFields));
    }
}
