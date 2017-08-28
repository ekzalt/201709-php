<?php

/*
$a = 100;

function staticPrint() {
  static $a = 0;
  $a++;
  echo "<p>$a</p>";
}

echo "<p>$a</p>";
staticPrint();
echo "<p>$a</p>";
staticPrint();
echo "<p>$a</p>";
staticPrint();
echo "<p>$a</p>";

echo 'Превед Медвед';
*/

///////////////////////////////////////////////////////

/*
echo '<select>';
for ($i = 1950; $i <= 2000; $i++) echo "<option value=\"$i\">$i</option>";
echo '</select>';
*/

///////////////////////////////////////////////////////

/*
// switch в PHP (в отличие от JS) делает не строгое сравнение
$n = '2';

switch ($n) {
  case 1:
    echo '<p>1</p>';
    break;
  
  case 2:
    echo '<p>2</p>';
    break;

  case 3:
    echo '<p>3</p>';
    break;
  
  default:
    echo '<p>0</p>';
}
*/

///////////////////////////////////////////////////////

/*
$a = 10; $b = 20;

// в PHP такое (в отличие от JS) не работает - вернет интерпретированный 1 или 0 (true или false)
// $c = $a || 30;

$c = $a < $b ? $a : $c; // OK

// в PHP такое (в отличие от JS) не работает
// $c = $a < $b && $a; // обрезанный тернарный оператор :)

echo $c;
*/

///////////////////////////////////////////////////////

/*
for ($i = 1; $i <= 4; $i++) {
  echo "<p><a href=\"photo.php?id=$i\">img $i</a></p>";
}
*/

///////////////////////////////////////////////////////

const MAX_X = 10;

$varFoo1 = function() {
  echo 'Hello';
};

$varFoo2 = $varFoo1;

function someFunc() {
  echo 'Hello';
}

function showArg() {
  echo MAX_X;
  echo '<br>';
  echo someFunc;
  echo '<br>';
}

echo '<p>Превед Медвед</p>';
showArg();
echo '<ol>
<li>У Констант и Функций глобальная область видимости.</li>
<li>Функции нельзя объявлять повторно, вкладывать друг в друга и возвращать из функций.</li>
<li>В PHP нет scope и closure (в моем понимании JS).</li>
<li>В PHP работает Function Expression (хоть этот синтаксис не подсвечивается) и передача объекта функции по ссылке.</li>
</ol>';

var_dump($varFoo1);
$varFoo1();
echo '<br>';
$varFoo2();

?>