<?php

use Importer\Readers\SpreadSheet\Data\SpreadsheetData;
use PHPUnit\Framework\TestCase;

class SpreadsheetDataTest extends TestCase
{
    public function testGetItems()
    {
        $header = ['TestColumn1', 'TestColumn2', 'TestColumn3'];

        $rows = [['123', 'aaa', '']];

        $spreadsheetData = new SpreadsheetData($header, $rows);

        $expected = [['TestColumn1' => '123', 'TestColumn2' => 'aaa', 'TestColumn3' => '']];

        $this->assertEquals($expected, $spreadsheetData->getItems());
    }
}