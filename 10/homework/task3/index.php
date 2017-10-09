<?php

function deleteInnerDirFile($path = '') {
  if ( !file_exists($path) ) return;

  $files = scandir($path);

  foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;

    $filePath = $path.DIRECTORY_SEPARATOR.$file;

    if ( is_dir($filePath) ) {
      deleteInnerDirFile($filePath);
      rmdir($filePath);
    } else {
      unlink($filePath);
    }
  }
}

?>