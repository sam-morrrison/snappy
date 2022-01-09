<?php

namespace Database\Seeders;

use App\Models\Property;
use League\Csv\Reader;

class PropertiesSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dd("BINGO! - We're here, somehow");
        $properties = [];
        $allowedFields = [
            'name',
            'type',
            'price'
        ];

        $seedFileLocation = storage_path("seeds/properties.csv");

        if (!file_exists($seedFileLocation)) {
            echo "\nThe input file does not exist at the location given. {$seedFileLocation} \n";
            return 1;
        }

        $seedFile = Reader::createFromPath($seedFileLocation);

        $headerFields = $seedFile->fetchOne();
        foreach($headerFields as $headerField) {
            if (!in_array($headerField, $allowedFields)) {
                echo "\nInvalid header - {$headerField} - Please check the contents of seeds/properties.csv \n\n";
                return 1;
            }
        }

        $seedFile->setHeaderOffset(0);

        foreach ($seedFile->getRecords() as $propertyData) {
            $properties[] = $propertyData;
        }

        foreach ($properties as $property) {
            Property::updateOrCreate($property);
        }
    }
}
