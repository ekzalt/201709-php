<?php

// В PHP могут быть отрицательные индексы

$arrNums = [10, 11, 12];
$arrStrs = ['zero', 'one', 'two'];

/*
// чтобы просто вернуть значение ячейки - переменная $key не обязательна
foreach ($arrNums as $value) {
  echo "<p>$value</p>";
}

// если же мы хотим вернуть имя ключа - переменная $key обязательна (здесь $key и $value - 2 независимые переменные)
foreach ($arrNums as $key => $value) {
  echo "<p>source: $arrNums, key: $key, value: $value</p>";
}

// чтобы значение ячейки перезаписать, нам нужно знать имя ключа - переменная $key обязательна (здесь $key и $value - 2 независимые переменные)
foreach ($arrNums as $key => $value) {
  $arrNums[$key] = pow($value, 2);
}

// &$value - & перед именем переменной создает передачу значения в нее по ссылке ($value становится ссылочной переменной, которая ссылается на родительскую ячейку памяти переменной $key)
foreach ($arrNums as $key => &$value) {
  // &$value -> $arrNums[$key]
  $value = pow($value, 2);
}

// &$value в таком виде становится связанной с ключем (с родительской ячейкой памяти) поэтому изменяя $value, мы меняем значение родительской ячейки памяти
foreach ($arrNums as &$value) {
  $value = pow($value, 2);
}

// пример:
$a = 5;
$b = &$a; // теперь обе переменные - ссылочные т.к. они ссылаются на одну область памяти, изменение значения в одной переменной меняет значение в другой
var_dump($b); // $b === 5
$b = 25;
var_dump($a); // $a === 5 -> $a === 25
$a = null;
var_dump($b); // $b === 25 -> $b === null , как их теперь отвязать друг от друга я не знаю :)))
*/

$arrAssoc = [
  'zero' => 0,
  'one' => 1,
  'two' => 2
];

$arrNums[] = 13;
$arrStrs[3] = 'three';
$arrAssoc['three'] = 3;

var_dump($arrNums);
var_dump($arrStrs);
var_dump($arrAssoc);

?>