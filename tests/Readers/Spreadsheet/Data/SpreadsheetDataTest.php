<?php

use Importer\Readers\SpreadSheet\Data\SpreadsheetData;
use PHPUnit\Framework\TestCase;

class SpreadsheetDataTest extends TestCase
{
    public function testGetItems()
    {
        $spreadsheetData = new SpreadsheetData();

        $spreadsheetData->setHeader(['TestColumn1', 'TestColumn2', 'TestColumn3']);

        $spreadsheetData->setRows([['123', 'aaa', '']]);

        $expected = [['TestColumn1' => '123', 'TestColumn2' => 'aaa', 'TestColumn3' => '']];

        $this->assertEquals($expected, $spreadsheetData->getItems());
    }
}