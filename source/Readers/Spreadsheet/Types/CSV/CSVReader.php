<?php namespace Importer\Readers\SpreadSheet\Types\CSV;

use Importer\Readers\IImportedData;
use Importer\Readers\SpreadSheet\Data\SpreadsheetData;
use Importer\Readers\SpreadSheet\SpreadsheetReader;
use SplFileObject;

class CSVReader extends SpreadsheetReader
{
    const COLUMN_DELIMITER = ';';

    // TODO: Check if the file has a header and instantiate spreadsheet data object accordingly.
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