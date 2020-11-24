<?php declare(strict_types=1);

function fizzBuzz(int $number): string
{

    if (!is_integer($number)) {
        echo "Not an integer";
    }

    $output = '';

    for ($i = 1; $i <= $number + 1; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            $output .= 'BuzzFizz';
        } else {
            if ($i % 3 == 0) {
                $output .= 'Fizz';
            } else {
                if ($i % 5 == 0) {
                    $output .= 'Buzz';
                } else {
                    $output .= $i;
                }
            }
        }
    }

    return $output;
}
