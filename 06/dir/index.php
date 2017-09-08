<?php

$pathDirImg = './img/';
$dir = opendir($pathDirImg);

if ($dir) {
  echo '<p>Your gallery</p>';

  while ( ( $fileName = readdir($dir) ) !== false ) {
    // echo $fileName . '<br>';
    if ($fileName === '.' || $fileName === '..') continue;

    echo "<div><img src=\"".$pathDirImg.$fileName."\" alt=\"pic\"></div>";
  }
}

closedir($dir);

?>