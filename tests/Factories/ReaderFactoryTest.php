<?php

use Importer\Factories\ReaderFactory;
use Importer\Readers\SpreadSheet\Types\CSV\CSVReader;
use PHPUnit\Framework\TestCase;

class ReaderFactoryTest extends TestCase
{
    private $subject;

    public function setUp()
    {
        parent::setUp();

        $this->subject = ReaderFactory::class;
    }

    public function testIfMakeReturnsTheCorrectFactory()
    {
        $reader = $this->subject::make('test.csv');

        $this->assertInstanceOf(CSVReader::class, $reader);
    }

    public function testIfMakeReturnsAnExceptionIfFileTypeIsNotSupported()
    {
        $this->expectException(\Importer\Exceptions\NoReaderForFileType::class);

        $this->subject::make('test.xslx');
    }
}