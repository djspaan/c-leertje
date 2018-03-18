<?php namespace Importer\Factories;

use Importer\Readers\IFileReader;

interface IReaderFactory
{
    public static function make(string $file): IFileReader;
}