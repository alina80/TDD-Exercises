<?php
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../exercise3.php';
class Exercise3Test extends TestCase
{
    public function testDivisibleBy3()
    {
        $result = fizzBuzz(3);
        $this->assertEquals('12Fizz', $result);
    }

    public function testDivisibleBy3and5()
    {
        $result = fizzBuzz(15);
        $this->assertEquals('12Fizz4BuzzFizz78FizzBuzz11Fizz1314BuzzFizz', $result);
    }
}