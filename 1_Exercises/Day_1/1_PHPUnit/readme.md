<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  PHPUnit

> Complete the exercises in appropriate files.

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**Remember about type declarations**

#### #### Exercise 1

1. The `exercise1.php` file contains a function that takes an integer (representing a year) and returns:  
   * `true` if it is a leap year,
   * `false` if not.
2. Write tests for this function that will check correctness of the returned type and correctness of indications.

#### Exercise 2

1. In the `exercise2.php`, there is a function named `numToTxt(int $number): bool` that executes the following task:
   ```
   Write a function that converts a number to a verbal representation of that number.
   E.g. 143 will be changed into "one hundred and forty-three".
   The numbers should be in the range of a thousand (excluding the
   thousand).
   
2. Design tests for the function that will diagnose the error.
3. The three basic test cases are:  
   * checking a number less than `10`
   * number greater than `10` and less than `20`
   * number greater than `100`

Fix the code after writing the tests.

-------------------------------------------------------------------------------

#### Exercise 3

1. The `exercise3.php` file contains a function that takes an integer as a parameter and returns numbers in the range from `1` to the passed integer, using the following modifications:
   * in place of numbers divisible by `3` it displays `Fizz`,
   * in place of numbers divisible by `5` it displays `Buzz`,
   * in place of numbers divisible by `3` i `5` it displays `BuzzFizz`.
2. Write a test for each of the cases above to check if a correct value is returned.

#### Exercise 4

1. The `exercise4.php` file contains a `Calculator` class and methods that perform mathematical operations.
2. Add tests to each mathematical operation to check them with different parameters and to check correctness of the returned results.
3. If necessary, modify the code so that it returns correct values.

#### Exercise 5

1. The `exercise5.php` file file contains a `BankAccount` class that has functionalities of a bank account.
2. Analyze how the code works and write the following tests:
   * Test that checks the constructor. It should check if the `cash` attribute is zeroed.  
   * Test for the `depositCash(float $amount): BankAccount` method that checks how it operates with different incorrect parameter  types or values.  
   * Test for the `withdrawCash(float $amount): ?float` method in the case of passing a greater amount than the one stored in the `cash` attribute.  
   * Test for the `printInfo()` method that should **return** the value of a private attribute named `cash`.  
3. If necessary, modify he code so that it returns correct values.
