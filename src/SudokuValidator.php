<?php

namespace App;

class SudokuValidator 
{
    const VALID_MSG   = 'Well done! Sudoku resolved.';
    const INVALID_MSG = 'Whoops! Some numbers are not correct...';

    /**
     * @var Sudoku
     */
    protected $sudoku;
 
    public function __construct(Sudoku $sudoku)
    {
        $this->sudoku = $sudoku;
    }

    /**
     * Validate Sudoku input
     * @return string
     */
    public function validate() : string
    {
        $rows    = $this->sudoku->getRows();
        $columns = $this->sudoku->getColumns();
        $boxes   = $this->sudoku->getBoxes();

        $isValid = $this->isValid($rows) && $this->isValid($columns) && $this->isValid($boxes);

        if (!$isValid) {
            return self::INVALID_MSG . PHP_EOL;
        }

        return self::VALID_MSG . PHP_EOL;
    }

    /**
     * Validate array of rows, columns or boxes values
     * @param array $input
     * @return bool
     */
    private function isValid(array $input) : bool
    {
        for ($row = 0; $row < 9; $row++) {
            sort($input[$row]);
            
            for ($column = 0; $column < 8; $column++) {
                $number     = $input[$row][$column]; 
                $nextNumber = $input[$row][$column + 1];

                if (
                    !($number && $number < 10) || 
                    $number <= 0 ||
                    !is_integer($number) 
                ) {
                    return false;
                }

                if ($number === $nextNumber) {
                    return false;
                }
            }
        }

        return true;
    }

}
