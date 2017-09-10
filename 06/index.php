<?php

error_reporting(E_ALL);
// phpinfo();

/////////////////////////////////////////////////////

// объявление функции + строгая типизация

function fullName(string $firstName, string $lastName): void {
  echo "<p>$firstName $lastName</p>";
}

$firstName = 'Vasya';
$lastName = 'Pupkin';

fullName($firstName, $lastName);

/////////////////////////////////////////////////////

// передача аргумента по ссылке

function multArr(array &$arr = [], int $mult = 2): array {
  // foreach ($arr as $key => $val) $arr[$key] = $val * $mult;

  foreach ($arr as &$val) $val = $val * $mult;

  return $arr;
}

$arr = range(5, 10);

// multArr($arr);
// multArr($arr, 3);
multArr();

var_dump($arr);

/////////////////////////////////////////////////////

// запись ранее объявленной функции в переменную

$func = 'fullName';
$func('Ivan', 'Ivanov');

// вызов через call_user_func();

call_user_func('fullName', 'Petr', 'Petrov');

/////////////////////////////////////////////////////

// анонимные функции

/*
$randomer = function($min, $max) {
  return rand($min, $max);
};

echo '<p>' .$randomer(1, 100) . '</p>';
*/

// использование use() - только в анонимных функциях!

$min = 5; $max = 10;

$randomer = function() use ($min, $max) {
  return rand($min, $max);
};

echo '<p>' .$randomer() . '</p>';

/////////////////////////////////////////////////////

/*
$list = [[
  'firstName' => 'Ivan',
  'lastName' => 'Ivanov'
], [
  'firstName' => 'Petr',
  'lastName' => 'Petrov'
]];

// создаем *.csv файл

$file = fopen('list.csv', 'w+');

// добавляем в файл заголовки таблицы

// декларативно
// fputcsv($file, ['firstName', 'lastName']);

// вычисляемо, более универсально
$head = [];
if (isset($list[0])) {
  $head = array_keys($list[0]);
  fputcsv($file, $head);
}

// добавляем в файл основной контент

foreach ($list as $item) {
  fputcsv($file, $item);
}

fclose($file);
*/

/////////////////////////////////////////////////////

// считываем *.csv файл

$file = fopen('list.csv', 'r');

while ($row = fgetcsv($file)) echo var_dump($row) . '<br>';

fclose($file);

?>