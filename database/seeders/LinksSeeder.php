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
        echo "Seeding Links...\n";

        foreach ($links as $link) {
            DB::table('agent_property')->updateOrInsert($link);
        }

        echo "Links seeding completed...\n\n";

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
