<?php
declare(strict_types=1);
namespace App\Helpers;

use League\Csv\Reader;

class Seeder
{

    /**
     * Use the given seeder to process the input file
     *
     * @param $seederSource
     * @param $inputFile
     * @return array
     */
    public function seed($seederSource, $inputFile)
    {

        $inputFile = "seeds/{$inputFile}.csv";
        $seedFileLocation = storage_path($inputFile);

        if (!file_exists($seedFileLocation)) {
            echo "\nThe input file does not exist at the location given....\n {$seedFileLocation} \n";
            return;
        }

        $seedFile = Reader::createFromPath($seedFileLocation);

        $headerFields = $seedFile->fetchOne();

        $seederDriver = "Database\\Seeders\\" . $seederSource;
        $seeder = new $seederDriver;

        if ($seeder->validateHeaders($headerFields)) {
            $seedFile->setHeaderOffset(0);

            foreach ($seedFile->getRecords() as $inputData) {
                $seedData[] = $inputData;
            }

            $seeder->seed($seedData);
        }
    }
}
