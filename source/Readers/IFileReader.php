<?php namespace Importer\Readers;

interface IFileReader
{
    public function read(): IImportedData;
}