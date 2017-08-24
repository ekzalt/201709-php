<?php

// comments

// однострочный комментарий

/*
многострочный
комментарий
*/

/////////////////////////////////////////////////

// constants

define('SOME_CONST_1', 100500); // старый способ объявления констант

echo SOME_CONST_1;
echo '</br>';

const SOME_CONST_2 = 500100; // новый способ

echo SOME_CONST_2;
echo '</br>';

/////////////////////////////////////////////////

// string

echo "<p>Hello</p>";
print "<p>Bye</p>";

$name = "Pit";

echo '<p>Hello my name is $name</p>'; // не вычисляет значение переменной
echo "<p>Hello my name is $name</p>"; // вычисяет значение переменной
echo "<p>Hello my name is ", $name, "</p>"; // передаем 3 аргумента
echo "<p>Hello my name is " . $name . "</p>"; // конкатенация

/////////////////////////////////////////////////

// number: integer (int)

$a = 10;
$b = 5;

echo $a + $b;
echo '</br>';

// number: double / float

$c = 1.2;
$d = 3.4;

echo $c + $d;
echo '</br>';

echo gettype($c);
echo '</br>';

/////////////////////////////////////////////////

// boolean (bool)

$student = false;
$worker = true;

echo $worker;
echo '</br>';

/////////////////////////////////////////////////

// pseudo_undefined

$undef;

// null

$init = null;

/////////////////////////////////////////////////

// array

/////////////////////////////////////////////////

// object

/////////////////////////////////////////////////

// resource

/////////////////////////////////////////////////

?>