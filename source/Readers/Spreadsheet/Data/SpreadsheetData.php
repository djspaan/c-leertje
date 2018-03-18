<?php namespace Importer\Readers\SpreadSheet\Data;

class SpreadsheetData implements ISpreadsheetData
{
    protected $header;

    protected $rows;

    public function getHeader(): array
    {
        return $this->header;
    }

    public function setHeader(array $header): ISpreadsheetData
    {
        $this->header = $header;
        return $this;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function setRows(array $rows): ISpreadsheetData
    {
        $this->rows = $rows;
        return $this;
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