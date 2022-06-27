<?php

function hourglass($arr)
{
    $size = sizeof($arr) / 2;
    $max_sum = 0;

    for ($i = 0; $i <= $size; $i++) {
        for ($j = 0; $j <= $size; $j++) {
            $sum = $arr[$i][$j] + $arr[$i][$j+1] + $arr[$i][$j+2] + $arr[$i+1][$j+1] + $arr[$i+2][$j] + $arr[$i+2][$j+1] + $arr[$i+2][$j+2];
            if ($i == 0 && $j==0)
                $max_sum = $sum;
            else if ($sum > $max_sum)
                $max_sum = $sum;
        }
    }

    return $max_sum;
}

$arr = array(
    array(-9, -9, -9,  1, 1, 1),
    array(0, -9,  0,  4, 3, 2),
    array(-9, -9, -9,  1, 2, 3),
    array(0,  0,  8,  6, 6, 0),
    array(0,  0,  0, -2, 0, 0),
    array(0,  0,  1,  2, 4, 0)
);

$result = hourglass($arr);

echo $result . "\n";
