<?php namespace Importer\Readers\SpreadSheet\Data;

class SpreadsheetData implements ISpreadsheetData
{
    private $header;

    private $rows;

    public function __construct(array $header, array $rows)
    {
        $this->header = $header;
        $this->rows = $rows;
    }

    public function getHeader(): array
    {
        return $this->header;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function getItems(): array
    {
        $rows = [];
        foreach ($this->rows as $row) {
            array_push($rows, array_combine($this->header, $row));
        }
        return $rows;
    }
}