<?php

namespace App\Helpers;

class Csv

{
    public function validateheaders($headerFields, $validFields)
    {
        foreach ($headerFields as $headerField) {
            if (!in_array($headerField, $validFields)) {
                echo "\nInvalid header - {$headerField}  \n\n";
                return false;
            }
        }

        return true;
    }
}
