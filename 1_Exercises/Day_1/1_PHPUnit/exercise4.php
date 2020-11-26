<?php declare(strict_types=1);

class Calculator
{
    public $operationHistory = [];

    public function __construct()
    {

    }

    public function add(int $num1, int $num2): int
    {
        $result = $num1 + $num2;
        $this->addOperationHistory("added $num1 to $num2 got $result");

        return $result;
    }

    public function multiply(int $num1, int $num2): int
    {
        $result = $num1 * $num2;
        $this->addOperationHistory("multiplied $num1 to $num2 got $result");

        return $result;
    }

    public function subtract(int $num1, int $num2): int
    {
        $result = $num1 - $num2;
        $this->operationHistory[] = "subtracted $num2 from $num1 got $result";

        return $result;
    }

    public function multiplyMany(array $numbers): int
    {
        if (!empty($numbers)){
            $result = 1;
            foreach ($numbers as $number) {
                $result *= $number;
            }
            $this->operationHistory[] = "multiplied numbers from [" . implode(',',$numbers) . "] got $result";

        }else{
            $result = 0;
            $this->operationHistory[] = "empty array got $result";
        }
        return $result;
    }

    public function divide(int $num1, int $num2): ?float
    {
        if ($num2 == 0) {
            echo "Error! Dividing by 0!";

            return null;
        }

        $result = $num1 / $num2;
        $this->operationHistory[] = "divided $num1 to $num2 got $result";

        return $result;
    }

    public function printOperations(): array
    {
        foreach ($this->operationHistory as $operation) {
            echo $operation . "<br>";
        }

        return $this->operationHistory;
    }

    public function clearOperations(): void
    {
        $this->operationHistory = [];
        if (empty($this->operationHistory)){
            echo "Operations cleared";
        }else{
            echo "Error on clearing operations!";
        }
    }

    public function addOperationHistory(string $operation): void
    {
        $this->operationHistory[] = $operation;
    }

    public function multiplyAnyAndAdd(array $numbers, int $numberToAdd): int
    {
        $temp = $this->multiplyMany($numbers);
        $result = $this->add($temp, $numberToAdd);

        return $result;
    }
}

