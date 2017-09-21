<?php

/*
// рекурсивная функция выводит дерево файлов в браузер
function printDir($path, $lvl = 0) {
  if (!file_exists($path)) return;

  $files = scandir($path);
  $spaces = str_pad(' ', $lvl * 4);

  foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;

    $filePath = $path . DIRECTORY_SEPARATOR . $file;
    $strFormatted = $spaces . '%s' . $file . '%s' . PHP_EOL;

    if (is_dir($filePath)) {
      // echo $spaces . '(d) ' . $file . PHP_EOL;
      // echo $spaces . '[' . $file . ']' . PHP_EOL;
      echo sprintf($strFormatted, '/', '/');
      printDir($filePath, $lvl + 1);

    } else {
      // var_dump($file);
      // echo $spaces . $file . "\n";
      // echo $spaces . '(f) ' . $file . PHP_EOL;
      // echo $spaces . $file . PHP_EOL;
      echo sprintf($strFormatted, '', '');
    }
  }
  // var_dump($files);
  // echo $spaces . $files . PHP_EOL;
}

$path = $_GET['path'] ?? './';
printDir($path);
*/

//////////////////////////////////////////////////

/*
// htmlentities() меняет исполняемые символы на html-символы
echo '<a href="http://google.com">google</a>';
echo htmlentities('<a href="http://google.com">google</a>');
*/

//////////////////////////////////////////////////

// рекурсивная функция выводит дерево файлов в ассоциативный массив
function getArrDir($path, $lvl = 0) {
  $result = [];

  if (!file_exists($path)) return $result;

  $item = [
    'type' => '',
    'name' => '',
    'path' => '',
    'level' => $lvl,
    'children' => []
  ];
  $files = scandir($path);

  foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;

    $filePath = $path . DIRECTORY_SEPARATOR . $file;
    $item['name'] = $file;
    $item['path'] = $filePath;
    $item['level'] = $lvl;

    if (is_dir($filePath)) {
      $item['type'] = 'dir';
      $item['children'] = getArrDir($filePath, $lvl + 1);
    } else {
      $item['type'] = 'file';
    }

    $result[] = $item;
  }

  return $result;
}

$path = $_GET['path'] ?? './';
$arr = getArrDir('c:\Program Files (x86)\Ampps\www');
var_dump($arr);

?>