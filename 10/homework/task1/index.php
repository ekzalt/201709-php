<?php

// task 1

function readFileGenerator($filePath) {
  $resource = fopen($filePath, 'r');

  if (!$resource) return;

  while (false !== $line = fgets($resource)) yield $line;

  fclose($resource);
}

foreach (readFileGenerator('text.txt') as $line) echo "<p>$line</p>";

?>