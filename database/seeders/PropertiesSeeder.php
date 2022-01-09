<?php

namespace Database\Seeders;

use App\Models\Property;

class PropertiesSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function seed($properties)
    {
        foreach ($properties as $property) {
            Property::updateOrCreate($property);
        }
    }

    public function validateHeaders($headerFields)
    {
        $allowedFields = [
            'name',
            'type',
            'price'
        ];

        foreach($headerFields as $headerField) {
            if (!in_array($headerField, $allowedFields)) {
                echo "\nInvalid header - {$headerField}  \n\n";
                return 1;
            }
        }
    }
}