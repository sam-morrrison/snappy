<?php

namespace Database\Seeders;

use App\Helpers\Csv;
use App\Models\Property;

class PropertiesSeeder
{
    public function seed($properties)
    {
        foreach ($properties as $property) {
            Property::updateOrCreate($property);
        }

        echo "\nProperties seeding completed...\n";
    }

    public function validateHeaders($headerFields)
    {
        $csv = new Csv;

        $validFields = [
            'name',
            'type',
            'price'
        ];

        return ($csv->validateheaders($headerFields, $validFields));

    }
}
