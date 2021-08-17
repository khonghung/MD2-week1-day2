<?php
$array = [
    ["2", "3", "4", "5", "6", "7"],
    ["13", "54", "15", "10"]
];

$result = [];
for ($i = 0; $i < count($array); $i++) { 
    for ($j = 0; $j < count($array[$i]); $j++){ 
    array_push($result, $array[$i][$j]);
    }
}
print_r($result);
echo "<br/>";                                   
  

$max = $result[0];
for($i = 0; $i < count($result); $i++){
    if($result[$i] > $max){
        $max = $result[$i];
    }
}
 
echo "Giá trị lớn nhất trong mảng là :".$max;

?>