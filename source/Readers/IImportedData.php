<?php namespace Importer\Readers;

interface IImportedData
{
    public function getItems(): array;
}