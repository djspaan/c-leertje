<?php namespace Importer\Readers;

abstract class FileReader implements IFileReader
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