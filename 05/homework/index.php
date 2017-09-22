<?php

// рекурсивная функция - выводит дерево файлов в ассоциативный массив
function getArrDir($path = '', $lvl = 0) {
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
      $item['children'] = [];
    }

    $result[] = $item;
  }

  return $result;
}

/*
// рекурсивная функция - выводит максимальный уровень вложенности в массиве
function getMaxLvl($arr = [], $lvl = 0, $maxLvl = 0) {
  if (!count($arr)) return $maxLvl;

  $maxLvl = ($maxLvl > $lvl) ? $maxLvl : $lvl;

  foreach ($arr as $item) {
    if ( count($item['children']) ) $maxLvl = getMaxLvl($item['children'], $lvl + 1, $maxLvl);
    else continue;
  }

  return $maxLvl;
}
*/

function printItem($arr) {
  foreach ($arr as $item) {
    if ($item['type'] === 'dir') echo "<p><small>{$item['level']}</small> | <b>{$item['name']}</b> | <small>{$item['path']}</small></p>";
    else echo "<p><small>{$item['level']}</small> | <i>{$item['name']}</i> | <small>{$item['path']}</small></p>";

    if ( count($item['children']) ) printItem($item['children']);
  }
}

function scanNWrite($dirPath, $filePath) {
  $arr = getArrDir($dirPath);
  // var_dump($arr);

  $strArr = serialize($arr);

  $file = fopen($filePath, 'w');
  fputs($file, $strArr);
  fclose($file);
}

function readNPrint($filePath) {
  if (!file_exists($filePath)) return;

  $file = fopen($filePath, 'r');
  $content = fgets($file);
  fclose($file);

  $arr = unserialize($content);

  if (!is_array($arr)) return;

  // var_dump($arr);
  printItem($arr);
}

/////////////////////////////////////////////////////////

scanNWrite('c:\Program Files (x86)\Ampps\www', 'text.txt');

// var_dump( readNPrint('text.txt') );
readNPrint('text.txt')

?>