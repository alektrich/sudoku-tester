<?php

namespace Tests;

use App\Exceptions\InputNotValidException;
use App\Sudoku;
use App\SudokuValidator;
use PHPUnit\Framework\TestCase;

class SudokuValidatorTest extends TestCase
{
    protected $validInput = [
        [1, 8, 2, /**/ 5, 4, 3, /**/ 6, 9, 7], 
        [9, 6, 5, /**/ 1, 7, 8, /**/ 3, 4, 2], 
        [7, 4, 3, /**/ 9, 6, 2, /**/ 8, 1, 5],
        /*---------------------------------*/ 
        [3, 7, 4, /**/ 8, 9, 6, /**/ 5, 2, 1], 
        [6, 2, 8, /**/ 4, 5, 1, /**/ 7, 3, 9], 
        [5, 1, 9, /**/ 2, 3, 7, /**/ 4, 6, 8],
        /*---------------------------------*/ 
        [2, 9, 7, /**/ 6, 8, 4, /**/ 1, 5, 3], 
        [4, 3, 1, /**/ 7, 2, 5, /**/ 9, 8, 6],
        [8, 5, 6, /**/ 3, 1, 9, /**/ 2, 7, 4],
    ];

    /** @test */
    public function it_returns_success_message_if_data_is_correct()
    {   
        $sudoku          = new Sudoku($this->validInput); 
        $sudokuValidator = new SudokuValidator($sudoku);
        $this->assertEquals(SudokuValidator::VALID_MSG . PHP_EOL, $sudokuValidator->validate());
    }

    /** 
     * @test 
     * @dataProvider getIncorrectInputs
     */
    public function it_returns_error_message_if_data_is_incorrect($input)
    {   
        $sudoku          = new Sudoku($input); 
        $sudokuValidator = new SudokuValidator($sudoku);
        $this->assertEquals(SudokuValidator::INVALID_MSG . PHP_EOL, $sudokuValidator->validate());
    }

    /** @test */
    public function it_returns_not_valid_input_error_if_input_structure_or_type_is_incorrect()
    {   
        $this->expectException(InputNotValidException::class);
        new Sudoku('some string'); 
    }

    public function getIncorrectInputs()
    {
        $duplicatedNumber = $this->validInput;
        $duplicatedNumber[0][1] = 1;

        $hasZero = $this->validInput;
        $hasZero[1][5] = 0;

        $hasNegativeNumber = $this->validInput;
        $hasNegativeNumber[2][4] = -4;

        $hasInvalidValues = $this->validInput;
        $hasInvalidValues[3][1] = 'some string';

        return [
            ['input' => $duplicatedNumber],
            ['input' => $hasZero],
            ['input' => $hasNegativeNumber],
            ['input' => $hasInvalidValues]
        ];
    }
}
