<?php

// task 1

// for ($i = 1; $i <= 2147; $i += 3) echo "<p>$i</p>";

////////////////////////////////////////////////////////

// task 2

/*
$arr = [];

for ($i = 0; $i < 10; $i ++) {
  if ($i % 2) array_push($arr, 1);
  else array_push($arr, 0);
}

var_dump($arr);
*/

////////////////////////////////////////////////////////

// task 3

/*
$arr = [];

for ($i = 0; $i < 10; $i ++) array_push($arr, pow($i, 2));

var_dump($arr);
*/

////////////////////////////////////////////////////////

// task 4.1

/*
$arr = [1, 2, 3, 4, 5];
$sum = 0;
$mult = count($arr) ? 1 : 0;

foreach ($arr as $n) {
  $sum += $n;
  $mult *= $n;
}

echo "<p>sum: $sum, mult: $mult</p>";
*/

// task 4.2

/*
$arr = [1, 2, 3, 4, 5];

$sum = array_sum($arr);

function rMmult($a, $b) {
  $a *= $b;
  return $a;
}

$mult = array_reduce($arr, 'rMmult', 1);

echo "<p>sum: $sum, mult: $mult</p>";
*/

////////////////////////////////////////////////////////

// task 5

/*
$arr = [1, 2, 4, 4, 2, 5];

// $arr = array_unique($arr);

function arrUni($arr) {
  $newArr = [];

  foreach ($arr as $val) {
    if ( !in_array($val, $newArr, true) ) $newArr[] = $val;
  }
  
  return $newArr;
}

$arr = arrUni($arr);

var_dump($arr);
*/

////////////////////////////////////////////////////////

// task 6

/*
$arr = [1, -2, 3, -4, 5, -6];

$arrTmp = [];

foreach ($arr as $val) {
  $arrTmp[] = $val;
  if ($val < 0) $arrTmp[] = 0;
}

$arr = $arrTmp;

var_dump($arr);
*/

////////////////////////////////////////////////////////

// task 7

/*
$bmw = [
  'model' => 'X5',
  'speed' => 120,
  'doors' => 5,
  'years' => '2006'
];

// наследовал структуру
$toyota = $opel = $bmw;

// обновил значения
$toyota['model'] = 'Carina'; $toyota['speed'] = 130; $toyota['doors'] = 4; $toyota['years'] = '2007';
$opel['model'] = 'Corsa'; $opel['speed'] = 140; $opel['doors'] = 5; $opel['years'] = '2007';

echo "<p>bmw - {$bmw['model']} - {$bmw['speed']} - {$bmw['doors']} - {$bmw['years']}</p>";
echo "<p>toyota - {$toyota['model']} - {$toyota['speed']} - {$toyota['doors']} - {$toyota['years']}</p>";
echo "<p>opel - {$opel['model']} - {$opel['speed']} - {$opel['doors']} - {$opel['years']}</p>";
*/

////////////////////////////////////////////////////////

// task 8

/*
$bmw = [
  'name' => 'bmw',
  'model' => 'X5',
  'speed' => 120,
  'doors' => 5,
  'years' => '2006'
];

// наследовал структуру
$toyota = $opel = $bmw;

// обновил значения
$toyota['name'] = 'toyota';
$toyota['model'] = 'Carina';
$toyota['speed'] = 130;
$toyota['doors'] = 4;
$toyota['years'] = '2007';

// обновил значения
$opel['name'] = 'opel';
$opel['model'] = 'Corsa';
$opel['speed'] = 140;
$opel['doors'] = 5;
$opel['years'] = '2007';

$cars = [$bmw, $toyota, $opel];

foreach ($cars as $car) {
  echo "<p>{$car['name']} - {$car['model']} - {$car['speed']} - {$car['doors']} - {$car['years']}</p>";
}
*/

?>