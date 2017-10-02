<?php

// task 3

$str = 'zero, one, two';
$arr = explode(', ', $str);
// $arr = array_reverse($arr);

function arrayReverse($arr) {
  $result = [];

  foreach ($arr as $val) array_unshift($result, $val);

  return $result;
}

$arr = arrayReverse($arr);

var_dump($arr);

/////////////////////////////////////////////////////

// task 4

function genStr($count, $chars) {
  $result = '';
  $chars = str_split($chars);

  for ($i = 0; $i < $count; $i++) {
    $index = rand(0, (count($chars) - 1));
    $result .= $chars[$index];
  }

  return $result;
}

$chars = 'abcdefghijklmnopqrstuvwxyz';

var_dump( genStr(100, $chars) );

/////////////////////////////////////////////////////

// task 5 (сортировка по 2-м полям, если первое совпадает, то сортирует еще и по 2-му)

$people = [[
  'id' => 123,
  'name' => 'Alex',
  'surname' => 'Zinger'
], [
  'id' => 124,
  'name' => 'Alex',
  'surname' => 'Bazzer'
], [
  'id' => 456,
  'name' => 'Pit',
  'surname' => 'Fox'
], [
  'id' => 457,
  'name' => 'Bob',
  'surname' => 'Stark'
], [
  'id' => 789,
  'name' => 'Pit',
  'surname' => 'Buffet'
], [
  'id' => 790,
  'name' => 'Bob',
  'surname' => 'Fox'
]];

function arrMultisort($data = [], $direction = 'asc', $field1 = 'name', $field2 = 'surname') {
  $field1Arr = [];
  $field2Arr = [];
  
  foreach ($data as $key => $row) {
    $field1Arr[$key] = $row[$field1];
    $field2Arr[$key] = $row[$field2];
  }

  switch ($direction) {
    case 'asc':
      array_multisort($field1Arr, SORT_ASC, $field2Arr, SORT_ASC, $data);
      return $data;
    case 'desc':
      array_multisort($field1Arr, SORT_DESC, $field2Arr, SORT_DESC, $data);
      return $data;
    default:
      return $data;
  }
}

var_dump( arrMultisort($people, 'asc', 'name', 'surname') );

?>