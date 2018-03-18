<?php namespace Importer\Exceptions;

class NoReaderForFileType extends \Exception
{
    public function __construct(string $extension = '', $code = 0, $previous = null)
    {
        $message = 'No reader is present for file type: ' . $extension;

        parent::__construct($message, $code, $previous);
    }
}