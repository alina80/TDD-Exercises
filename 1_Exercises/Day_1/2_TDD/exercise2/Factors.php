<?php

class Factors
{
    public static function generatePrimeFactors(int $n) : array
    {
        $arr = [];
        for ($i = 1; $i <= $n; $i ++){
            if ($n % $i == 0){
                $arr[] = $i;
            }
        }
        return $arr;
    }

}