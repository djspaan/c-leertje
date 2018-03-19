<?php namespace Importer\Readers\SpreadSheet\Data;

use Importer\Readers\IImportedData;

interface ISpreadsheetData extends IImportedData
{
    public function getRows(): array;

    public function getHeader(): array;
}