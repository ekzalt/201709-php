<?php

function readDirFiles($pathDir) {
  $files = [];

  $dir = opendir($pathDir);
  
  if ($dir) {
    while ( ( $file = readdir($dir) ) !== false ) {
      if ($file === '.' || $file === '..') continue;

      $files[] = $pathDir . $file;
    }
  }
  
  closedir($dir);

  return $files;
}

?>