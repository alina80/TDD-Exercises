<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../Factors.php';

class TestFactors extends TestCase
{
    public function testGeneratePrimeFactors()
    {
        $result = Factors::generatePrimeFactors(12);

        $this->assertEquals([1,2,3,4,6,12],$result);
    }
}