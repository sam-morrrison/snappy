<?php

namespace Database\Seeders;

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
    }

    public function validateHeaders($headerFields)
    {
        $allowedFields = [
            'agent_id',
            'property_id',
            'role'
        ];

        foreach($headerFields as $headerField) {
            if (!in_array($headerField, $allowedFields)) {
                echo "\nInvalid header - {$headerField}  \n\n";
                return 1;
            }
        }
    }
}
