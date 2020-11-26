<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../Circle.php';

class TestCircle extends TestCase
{
    public function testCircleArea()
    {
        $rad = 5;
        $result = new Circle();
        $area = $result->circleArea($rad);

        $this->assertEquals(3.14 * $rad *$rad,$area);
    }

}