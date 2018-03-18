<?php namespace Importer\Factories;

use Importer\Exceptions\NoReaderForFileType;
use Importer\Readers\IReader;
use Importer\Readers\SpreadSheet\Types\CSV\CSVReader;

class ReaderFactory implements IReaderFactory
{
    public static function make(string $file): IReader
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        switch ($extension) {
            case 'csv':
                return new CSVReader($file);
            default:
                throw new NoReaderForFileType($extension);
        }
    }
}