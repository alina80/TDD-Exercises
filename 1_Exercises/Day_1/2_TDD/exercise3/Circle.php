<?php

class Circle
{
    private const PI = 3.14;
    public function circleArea(float $r) : float
    {
        if ($r > 0){
            $area = self::PI * $r * $r;

        }else{
            throw new Exception("Negative radius !!");
        }
        return round($area,2);
    }
}