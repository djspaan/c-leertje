<?php namespace Importer\Factories;

use Importer\Readers\IReader;

interface IReaderFactory
{
    public static function make(string $file): IReader;
}