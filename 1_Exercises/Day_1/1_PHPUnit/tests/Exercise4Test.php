<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../exercise4.php';

class Exercise4Test extends TestCase
{
    private Calculator $calculator;
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->calculator = new Calculator();
    }

    public function testAdd(){
        $add = $this->calculator;
        $result = $add->add(2,-3);

        $this->assertEquals(-1, $result);
    }

    public function testMultiply(){
        $multiply = $this->calculator;
        $result = $multiply->multiply(2,3);

        $this->assertEquals(6, $result);
    }

    public function testSubtract(){
        $subtract = $this->calculator;
        $result = $subtract->subtract(4,3);

        $this->assertEquals(1, $result);
    }

    public function testMultiplyMany(){
        $multiplyMany = $this->calculator;
        $result = $multiplyMany->multiplyMany([]);

        $this->assertEquals(0, $result);
    }

    public function testDivide(){
        $divide = $this->calculator;
        $result = $divide->divide(6,2);
        $this->assertEquals(3, $result);
    }

    public function testPrintOperations(){
        $history = $this->calculator;
        $history->add(1,2);
        $history->multiply(1,2);
        $result = $history->printOperations();

        $this->assertEquals([
            "added 1 to 2 got 3",
            "multiplied 1 to 2 got 2"
        ], $result);

    }

    public function testMultiplyManyAndAdd(){
        $multiplyManyAndAdd = $this->calculator;
        $result = $multiplyManyAndAdd->multiplyAnyAndAdd([1,2,3],4);

        $this->assertEquals(10, $result);
    }

    public function testClearOperations(){
        $clear = $this->calculator;
        $clear->clearOperations();
        $result = $clear->operationHistory;

        $this->assertEquals([],$result);
    }

    public function testAddOperations(){
        $operation = $this->calculator;
        $operation->addOperationHistory('added 1 to 2 got 3');
        $result = $operation->operationHistory;

        $this->assertEquals(['added 1 to 2 got 3'],$result);
    }
}