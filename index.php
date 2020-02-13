<?php

require __DIR__.'/vendor/autoload.php';

use App\Sudoku;
use App\SudokuValidator;
use App\Exceptions\InputNotValidException;

// Enter your numbers below
// and run "php index.php" to check your results

$results = [
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

try {
    $sudoku          = new Sudoku($results); 
    $sudokuValidator = new SudokuValidator($sudoku);
    echo $sudokuValidator->validate();
} catch(InputNotValidException $e) {
    echo $e->getMessage() . PHP_EOL;
}
