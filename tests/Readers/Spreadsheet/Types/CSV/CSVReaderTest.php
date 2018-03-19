<?php

use Importer\Readers\SpreadSheet\Data\ISpreadsheetData;
use Importer\Readers\SpreadSheet\Data\SpreadsheetData;
use Importer\Readers\SpreadSheet\Types\CSV\CSVReader;
use PHPUnit\Framework\TestCase;

class CSVReaderTest extends TestCase
{
    private $subject;

    public function setUp()
    {
        parent::setUp();

        $this->subject = new CSVReader(__DIR__ . '/test.csv');
    }

    public function testRead()
    {
        $actualSpreadsheet = $this->subject->read();

        $this->assertInstanceOf(ISpreadsheetData::class, $actualSpreadsheet);

        $expectedHeader = ["Sku","Name","PrIce","ShortDescription","FullDescription","Brand","Model","VAT","ModelNumber","Color"];

        $expectedRows = [
            ["1234894","naam","2495","Schoenuh","Vetta pata's","Henry's slippers","Normaal","2100","158","Yellow"],
            ["1234895","naam2","2995","Meer schoenuh","Vetta pata's","Kanos","Normaal","2100","158","Yellow"]
        ];

        $expectedSpreadsheet = new SpreadsheetData($expectedHeader, $expectedRows);

        $this->assertEquals($expectedSpreadsheet, $actualSpreadsheet);
    }
}