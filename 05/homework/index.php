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
    // $item['level'] = $lvl;

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

// рекурсивная функция - выводит максимальный уровень вложенности в массиве
function getMaxLvl($arr = []) {
  $itemsLvls = [];

  if (!count($arr)) return $itemsLvls;

  foreach ($arr as $item) {
    $lvl = 0;

    if (count($item['children'])) {
      $lvl++;
      getMaxLvl($item['children']);
      
    } else {
      continue;
    }

    $itemsLvls[] = $lvl;
  }

  return $itemsLvls;
}

/////////////////////////////////////////////////////////

$path = $_GET['path'] ?? './';
$arr = getArrDir('c:\Program Files (x86)\Ampps\www');
// var_dump($arr);

// преобразовал массив в строку
$strArrSerialized = serialize($arr);
// var_dump($strArrSerialized);

// записал/прочитал файл
$pathTxt = 'text.txt';
$fileContent = '';

if (!file_exists($pathTxt)) {
  $file = fopen($pathTxt, 'w');
  fputs($file, $strArrSerialized); // текстовая запись
  fclose($file);

} else {
  $file = fopen($pathTxt, 'r');
  $fileContent = fgets($file); // текстовое чтение
  fclose($file);
}

// var_dump($fileContent);

// преобразовал строку в массив обратно
$arrUnserialized = unserialize($fileContent);
var_dump($arrUnserialized);

// получил уровни вложенности для каждой ветви дерева директорий
if (!is_array($$arrUnserialized)) $arrUnserialized = [];
$arrItemsLvls = getMaxLvl($arrUnserialized);

// вывел максимальный уровень вложенности для каждого элемента
var_dump($arrItemsLvls);

sort($arrItemsLvls);

// вывел максимальный уровень вложенности вцелом
var_dump($arrItemsLvls[count($arrItemsLvls) - 1]);

?>