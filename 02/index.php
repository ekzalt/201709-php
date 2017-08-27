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

for ($i = 1; $i <= 4; $i++) {
  echo "<p><a href=\"photo.php?id=$i\">img $i</a></p>";
}

?>