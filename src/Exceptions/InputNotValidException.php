<?php

namespace App\Exceptions;

class InputNotValidException extends \Exception 
{
    protected $message = 'Sudoku input is not valid. Please make sure you are using the correct input structure.';
}