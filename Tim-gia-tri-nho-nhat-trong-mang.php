<?php


$array = [10, 5, 3, 15, 23, 8, 34, 60, 2];

$min = null;
$index = null;

for ($i = 0; $i < count($array); $i++) {
    if ($min == null) {
        $min = $array[$i];
        $index = $i;
    } else {
        if ($array[$i] < $min) {
            $min = $array[$i];
            $index = $i;
        }
    }
}

echo "Giá trị nhỏ nhất là $min, nằm tại vị trí $index";
