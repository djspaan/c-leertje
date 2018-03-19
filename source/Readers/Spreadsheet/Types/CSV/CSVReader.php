<?php namespace Importer\Readers\SpreadSheet\Types\CSV;

use Importer\Readers\IFileReader;
use Importer\Readers\IImportedData;
use Importer\Readers\SpreadSheet\Data\SpreadsheetData;
use SplFileObject;

class CSVReader implements IFileReader
{
    const COLUMN_DELIMITER = ';';

    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function read(): IImportedData
    {
        $file = $this->getFileObject();

        $rows = $this->getRows($file);

        $header = array_shift($rows);

        return new SpreadsheetData($header, $rows);
    }

    private function getFileObject(): SplFileObject
    {
        $file = new SplFileObject($this->filePath);

        $file->setFlags(SplFileObject::READ_CSV);

        return $file;
    }

    private function getRows(SplFileObject $file): array
    {
        $rows = [];

        foreach ($file as $row) {
            array_push($rows, explode(self::COLUMN_DELIMITER, $row[0]));
        }

        return $rows;
    }
}