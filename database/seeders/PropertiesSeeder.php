<?php

namespace Database\Seeders;

use App\Helpers\Csv;
use App\Models\Property;

class PropertiesSeeder
{
    public function seed($properties)
    {
        echo "Seeding Properties...\n";

        foreach ($properties as $property) {
            Property::updateOrCreate($property);
        }

        echo "Properties seeding completed...\n\n";
    }

    public function validateHeaders($headerFields)
    {
        $csv = app()->make(Csv::class);

        $validFields = [
            'name',
            'type',
            'price'
        ];

        return ($csv->validateheaders($headerFields, $validFields));

    }
}
