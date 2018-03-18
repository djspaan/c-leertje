<?php namespace Importer\Readers;

interface IReader
{
    public function read(): IImportedData;

}