<?php
declare(strict_types=1);
namespace App\Helpers;

class Csv

{
    /**
     * Validate that each given header is in the array of valid header values
     *
     * @param $headerFields
     * @param $validFields
     * @return boolean
     */
    public function validateheaders($headerFields, $validFields)
    {
        foreach ($headerFields as $headerField) {
            if (!in_array($headerField, $validFields)) {
                echo "\n\nSeed Error - - - Invalid header - {$headerField}  \n\n";
                return false;
            }
        }

        return true;
    }
}
