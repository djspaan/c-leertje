<?php namespace Importer\Readers\SpreadSheet;

use Importer\Readers\IImportedData;
use Importer\Readers\IReader;

abstract class SpreadsheetReader implements IReader
{
    protected $file;

    public abstract function read(): IImportedData;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function getFile(): string
    {
        return $this->file;
    }


}