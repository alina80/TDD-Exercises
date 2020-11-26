<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/../exercise5.php';

class Exercise5Test extends TestCase
{
    public function testConstructor(){
        $bankAccount = new BankAccount();
        $result = $bankAccount->getCash();

        $this->assertEquals(0.0,$result);
    }

    public function testDepositChash(){
        $bankAccount = new BankAccount();
        $result = $bankAccount->depositCash(100);

        $this->assertEquals(100,$result);
    }

    public function testWithdrawChash(){
        $bankAccount = new BankAccount();
        $bankAccount->depositCash(50);
        $result = $bankAccount->withdrawCash(60);

        $this->assertEquals(50,$result);
    }

    public function testPrintInfo(){
        $bankAccount = new BankAccount();
        $bankAccount->depositCash(50);
        $result = $bankAccount->printInfo();

        $this->assertEquals(50,$result);
    }
}