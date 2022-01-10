<?php

namespace Database\Seeders;

use App\Helpers\Csv;
use Illuminate\Support\Facades\Http;

class PropertiesSeeder
{
    public function seed($properties)
    {
        echo "Seeding Properties...\n";

        $rootUri = url()->full();

        foreach ($properties as $property) {
            Http::post($rootUri . '/api/property', $property);
        }

        echo "Properties seeding completed...\n\n";
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
