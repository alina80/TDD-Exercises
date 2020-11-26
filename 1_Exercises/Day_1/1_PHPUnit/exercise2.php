<?php declare(strict_types=1);

function numToTxt(int $number): ?string
{

    if (!is_int($number) || $number < 1 || $number > 999) {
        echo "Insert number from 1 to 999";

        return null;
    }

    $number = strval($number);

    $lengthNum = strlen(strval($number));

    if ($lengthNum == 3) {
        $hundreds = substr($number, 0, 1);
        $tens = substr($number, 1, 1);
        $ones = substr($number, 2, 3);
    }
    if ($lengthNum == 2) {
        $tens = substr($number, 0, 1);
        $ones = substr($number, 1, 1);
        $hundreds = 0;
    }
    if ($lengthNum == 1) {
        $ones = substr($number, 0, 1);
        $hundreds = 0;
        $tens = 0;
    }


    $numsOnes = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eigt', 'nine'];
    $numsHundreds = [
        '',
        'one hundred',
        'two hundred',
        'three hundred',
        'four hundred',
        'five hundred',
        'six hundred',
        'seven hundred',
        'eight hundred',
        'nine hundred',
    ];
    $numsTens = [
        '',
        'ten',
        'twenty',
        'thirty',
        'forty',
        'fifty',
        'sixty',
        'seventy',
        'eighty',
        'ninety',
    ];
    $part1 = $numsHundreds[$hundreds];
    $part2 = $numsTens[$tens];

    $part3 = $numsOnes[$ones];

    if ($hundreds == 0) {
        $part1 = '';
    }
    if ($tens == 0) {
        $part2 = '';
    }
    if ($ones == 0) {
        $part3 = '';
    }
    if ($tens == 1) {
        $part3 = '';

        switch ($ones) {
            case 0:
                $part2 = " ten";
                break;
            case 1:
                $part2 = " eleven";
                break;
            case 2:
                $part2 = " twelve";
                break;
            case 3:
                $part2 = " thirteen";
                break;
            case 4:
                $part2 = " fourteen";
                break;
            case 5:
                $part2 = " fifteen";
                break;
            case 6:
                $part2 = " sixteen";
                break;
            case 7:
                $part2 = " seventeen";
                break;
            case 8:
                $part2 = " eighteen";
                break;
            case 9:
                $part2 = " nineteen";
        }
    }

    return $sum = trim($part1 . ' ' . $part2 . ' ' . $part3);
}
