<?php declare(strict_types=1);


function isYearLeap(int $year = null): bool
{
    if (isset($year) && $year > 0) {
        $isYearLeap = (date('L', mktime(0, 0, 0, 1, 1, $year)) ? true : false);

        return $isYearLeap;
    } else {
        return false;
    }
}
