<?php

namespace App;

class Sudoku
{
    /**
     * @var array
     */
    protected $rows;

    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @var array
     */
    protected $boxes   = [];

    public function __construct($rows)
    {
        $this->rows = $rows;
        $this->prepareData();
    }

    /**
     * Prepare columns and boxes values
     * @return void
     */
    private function prepareData() : void
    {
        for ($row = 0; $row < 9; $row++) {
            array_push($this->boxes, []);
            array_push($this->columns, []);
        }

        for ($row = 0; $row < 9; $row++) {
            for ($column = 0; $column < 9; $column++) {
                $this->setColumn($row, $column);
                $this->setBox($row, $column);
            }
        }
    }

    /**
     * Prepare columns and boxes values
     * @param int $row
     * @param int $column
     * @return void
     */
    private function setColumn(int $row, int $column) : void
    {
        $this->columns[$column][$row] = $this->rows[$row][$column];
    }

    /**
     * Prepare columns and boxes values
     * @param int $row
     * @param int $column
     * @return void
     */
    private function setBox(int $row, int $column) : void
    {
        $boxRow = floor( $row / 3 );
        $boxCol = floor( $column / 3 );
        $boxIndex = $boxRow * 3 + $boxCol;

        array_push($this->boxes[$boxIndex], $this->rows[$row][$column]);
    }

    /**
     * Get rows values
     * @return array
     */
    public function getRows() : array
    {
        return $this->rows;
    }

    /**
     * Get columns values
     * @return array
     */
    public function getColumns() : array
    {
        return $this->columns;
    }

    /**
     * Get boxes values
     * @return array
     */
    public function getBoxes() : array
    {
        return $this->boxes;
    }
}
