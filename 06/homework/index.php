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

// версия 1
function printItem($arr) {
  $html = '<div class="container">';

  foreach ($arr as $item) {
    if ($item['type'] === 'dir') $html .= "<p class=\"dir\"><small>{$item['level']}</small> | <span>{$item['name']}</span> | <small>{$item['path']}</small></p>";
    else $html .= "<p class=\"file\"><small>{$item['level']}</small> | <span>{$item['name']}</span> | <small>{$item['path']}</small></p>";

    if ( count($item['children']) ) $html .= printItem($item['children']);
  }

  $html .= '</div>';
  return $html;
}

/*
// версия 2 - с примера
$maxLevel = 0;

function printItem($arr) {
  $html = '<div class="container">';

  foreach ($arr as $item) {
      $maxLevel = $item['level'] > $maxLevel ? $item['level'] : $maxLevel;
      $item_html = "<div class='%s'><span class='title' title='{$item['path']}'>{$item['name']}</span><span class='path'>({$item['path']})</span></div>";
      
      if ($item['type'] === 'file') {
          $html .= sprintf($item_html, 'file');

      } else if ($item['type'] === 'dir') {
          $html .= sprintf($item_html, 'dir');

          if (!isset($item['children']) || !is_array($item['children'])) throw new Error("Key 'children' must be an array");

          $html .= printItem($item['children']);

      } else {
          throw new Error("Unknown item 'type': {$item['type']}");
      }
  }

  $html .= '</div>';

  return $html;
}
*/

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
  return printItem($arr);
}

/////////////////////////////////////////////////////////

scanNWrite('c:\Program Files (x86)\Ampps\www', 'text.txt');

// var_dump( readNPrint('text.txt') );
$title = 'File list';
$html = readNPrint('text.txt')

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?= $title ?></title>

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main>
    <h1><?= $title ?></h1>
    
    <?= $html ?>
  </main>
  
  <script src="main.js"></script>
</body>
</html>