<?php namespace Importer\Readers\SpreadSheet\Data;

use Importer\Readers\IImportedData;

interface ISpreadsheetData extends IImportedData
{
    public function getRows(): array;

    public function setRows(array $rows): self;

    public function getHeader(): array;

    public function setHeader(array $header): self;
}