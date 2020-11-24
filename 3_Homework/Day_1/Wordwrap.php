<?php declare(strict_types=1);

function wordWrapper(string $text, int $length): array
{
    $result = [];
    if (strlen($text) > $length) {
        $parts = explode(' ', $text);
        $wrapped = array_shift($parts);

        while (count($parts) > 0) {
            $nextPart = array_pop($parts);
            if (strlen($wrapped . ' ' . $nextPart) >= $length) {
                $result[] = $wrapped;
                $wrapped = $nextPart;
            } else {
                $wrapped .= ' ' . $nextPart;
            }
        }
        $result[] = $wrapped;
    } else {
        $result[] = '$text length is less than $lenght value';
    }

    return $result;
}
