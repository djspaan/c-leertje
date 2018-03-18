<?php

use Importer\Factories\ReaderFactory;
use Importer\Readers\SpreadSheet\Types\CSV\CSVReader;
use PHPUnit\Framework\TestCase;

class ReaderFactoryTest extends TestCase
{
    public function testIfMakeReturnsTheCorrectFactory()
    {
        $reader = ReaderFactory::make('test.csv');

        $this->assertInstanceOf(CSVReader::class, $reader);
    }

    public function testIfMakeReturnsAnExceptionIfFileTypeIsNotSupported()
    {
        $this->expectException(\Importer\Exceptions\NoReaderForFileType::class);

        $reader = ReaderFactory::make('test.xslx');
    }
}