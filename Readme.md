# Idea

We have to validate 3 levels: each row, each column and each 3 x 3 box. 
The input will actually be the rows, and we use it to generate columns and boxes values.

In terms of structure, all three (rows, columns and boxes) will be the same array as an input (row), 
but with the different values that will be generated using the appropriate logic and operations.

Then we use the same validate method for all 3 arrays.

# How to try it out

1. Run `composer install` to initiate the project.
2. In `index.php`, enter the input numbers.
3. Run `php index.php` in the console.
4. Run `phpunit` to run tests.
