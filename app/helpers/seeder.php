<?php

namespace App\Helpers;


class Seeder
{

    public function seed($seederSource, $inputFile)
    {

        $seederDriver = "Database\\Seeders\\" . $seederSource;
        $seeder = new $seederDriver;

        $seeder->run($inputFile);

    }
}
