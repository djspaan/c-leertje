<?php namespace Importer\Factories;

use Importer\Exceptions\NoReaderForFileType;
use Importer\Readers\IFileReader;
use Importer\Readers\SpreadSheet\Types\CSV\CSVReader;

class ReaderFactory implements IReaderFactory
{
    public static function make(string $filePath): IFileReader
    {
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

        switch ($fileExtension) {
            case 'csv':
                return new CSVReader($filePath);
            default:
                throw new NoReaderForFileType($fileExtension);
        }
    }
}