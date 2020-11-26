<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../exercise2.php';
class Exercise2Test extends TestCase
{
    public function testLt10()
    {
        $result = numToTxt(9);
        $this->assertEquals('nine', $result);

    }

    public function testBt10100()
    {
        $result = numToTxt(23);
        $this->assertEquals('twenty three', $result);

    }

    public function testGt100()
    {
        $result = numToTxt(143);
        $this->assertEquals('one hundred forty three', $result);

    }
}