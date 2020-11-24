<?php declare(strict_types=1);

class BankAccount
{
    private $number;
    private $cash;
    private static $nextAccNumber = 1;

    public function __construct()
    {
        $this->number = self::$nextAccNumber;
        self::$nextAccNumber++;
        $this->cash = 0.0;
        echo "Your account number: $this->number.<br>";
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getCash(): float
    {
        return $this->cash;
    }

    public function depositCash(float $amount): BankAccount
    {
        if (is_numeric($amount) && $amount > 0) {
            $this->cash += $amount;
        }

        return $this;
    }

    public function withdrawCash(float $amount): ?float
    {
        if (is_numeric($amount) && $amount > 0) {
            if ($amount > $this->cash) {
                $withdraw = $this->cash;
            } else {
                $withdraw = $amount;
            }
            $this->cash -= $withdraw;

            return $withdraw;
        }

        return null;
    }

    public function printInfo(): void
    {
        echo $this->cash;
    }
}
