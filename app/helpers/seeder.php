<?php

namespace App\Helpers;


use League\Csv\Reader;

class Seeder
{

    public function seed($seederSource, $inputFile)
    {

        $inputFile = "seeds/{$inputFile}.csv";
        $seedFileLocation = storage_path($inputFile);

        if (!file_exists($seedFileLocation)) {
            echo "\nThe input file does not exist at the location given. {$seedFileLocation} \n";
            return 1;
        }

        $seedFile = Reader::createFromPath($seedFileLocation);

        $headerFields = $seedFile->fetchOne();

        $seederDriver = "Database\\Seeders\\" . $seederSource;
        $seeder = new $seederDriver;

        $seeder->validateHeaders($headerFields);

        $seedFile->setHeaderOffset(0);

        foreach ($seedFile->getRecords() as $inputData) {
            $seedData[] = $inputData;
        }

        $seeder->seed($seedData);

    }
}
