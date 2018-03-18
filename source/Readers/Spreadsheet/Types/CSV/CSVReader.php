<?php namespace Importer\Readers\SpreadSheet\Types\CSV;

use Importer\Readers\IImportedData;
use Importer\Readers\SpreadSheet\Data\SpreadsheetData;
use Importer\Readers\FileReader;
use SplFileObject;

class CSVReader extends FileReader
{
    const COLUMN_DELIMITER = ';';

    public function read(): IImportedData
    {
        $file = $this->getFileObject();

        $rows = $this->getRows($file);

        $header = array_shift($rows);

        return (new SpreadsheetData())->setHeader($header)->setRows($rows);
    }

    private function getFileObject(): SplFileObject
    {
        $file = new SplFileObject($this->file);

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