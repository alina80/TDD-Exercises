<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../exercise1.php';
class SampleTest extends TestCase
{
    public function testTrue()
    {
        $result = isYearLeap(2020);

        $this->assertTrue($result,
            'Should be leap year');
    }

    public function testFalse()
    {
        $result = isYearLeap();

        $this->assertFalse($result,
            'The function isLeapYear should return false');
    }

    public function testNegativeYear()
    {
        $result = isYearLeap(-2020);

        $this->assertFalse($result,
            'Year must be positive number');
    }
}
