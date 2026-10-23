<?php

declare(strict_types=1);

/**
 * This function checks if given number is Armstrong
 * e.g. 153
 *
 * @return bool
 */
function isNumberArmstrong(int $input): bool
{
    $arr = array_map('intval', str_split((string) $input));
    $sumOfCubes = 0;
    foreach ($arr as $num) {
        $sumOfCubes += $num * $num * $num;
    }

    return $sumOfCubes == $input;
}
