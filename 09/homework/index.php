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

// task 5

$people = [[
  'id' => 123,
  'name' => 'Alex',
  'surname' => 'Zinger'
], [
  'id' => 456,
  'name' => 'Pit',
  'surname' => 'Buffet'
], [
  'id' => 789,
  'name' => 'Bob',
  'surname' => 'Stark'
]];

function arrMultisort($data = [], $direction = 'asc', $field = 'name') { // [], 'asc'/'desc', 'key'
  $monoArr = [];
  
  foreach ($data as $key => $row) $monoArr[$key] = $row[$field];

  switch ($direction) {
    case 'asc':
      array_multisort($monoArr, SORT_ASC, $data);
      return $data;
    case 'desc':
      array_multisort($monoArr, SORT_DESC, $data);
      return $data;
    default:
      return $data;
  }
}

var_dump( arrMultisort($people, 'desc', 'surname') );

?>