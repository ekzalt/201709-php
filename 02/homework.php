<?php

const MAX_X = 10;
const MAX_Y = 10;
const MIN_X = -10;
const MIN_Y = -10;

$sectorTopRight = array(
  'x' => 7, // type int, range 0 | 10
  'y' => 5, // type int, range 0 | 10
  'position' => 'topRight',
  'figure' => 'triangle'
);

$sectorBottomRight = array(
  'x' => 7, // type int, range 0 | 10
  'y' => -5, // type int, range 0 | -10
  'position' => 'bottomRight',
  'figure' => 'rectangle'
);

$sectorBottomLeft = array(
  'x' => -5, // type int, range 0 | -10
  'y' => -7, // type int, range 0 | -10
  'position' => 'bottomLeft',
  'figure' => 'triangle'
);

$sectorTopLeft = array(
  'x' => -5, // type int, range 0 | -10
  'y' => 5, // type int, range 0 | 10, если это радиус круга, то абсолютные X и Y равны
  'position' => 'topLeft',
  'figure' => 'arc'
);

$area = array($sectorTopRight, $sectorBottomRight, $sectorBottomLeft, $sectorTopLeft);

function formulaTriangle($point, $currentSector) {
  //
}

function formulaRectangle($point, $currentSector) {
  switch($currentSector['position']) {
    case 'topRight':
      return ($point['x'] > $currentSector['x'] || $point['y'] > $currentSector['y']) ? false : true;

    case 'bottomRight':
      return ($point['x'] > $currentSector['x'] || $point['y'] < $currentSector['y']) ? false : true;

    case 'bottomLeft':
      return ($point['x'] < $currentSector['x'] || $point['y'] < $currentSector['y']) ? false : true;

    case 'topLeft':
      return ($point['x'] < $currentSector['x'] || $point['y'] > $currentSector['y']) ? false : true;
  }
}

function formulaArc($point, $currentSector) {
  return abs($point['x']) > abs($currentSector['x']) ? false : true;
}

function checkPoint($point, $area) {
  if     ($point['x'] > 0 && $point['y'] > 0) $position = 'topRight';
  elseif ($point['x'] > 0 && $point['y'] < 0) $position = 'bottomRight';
  elseif ($point['x'] < 0 && $point['y'] < 0) $position = 'bottomLeft';
  elseif ($point['x'] < 0 && $point['y'] > 0) $position = 'topLeft';
  else   return null;

  foreach ($area as $sector) {
    if ($sector['position'] === $position) {
      $currentSector = $sector;
      break; 
    }
  }

  switch($currentSector['figure']) {
    case 'triangle':
      $result = formulaTriangle($point, $currentSector);
      break;
    
    case 'rectangle':
      $result = formulaRectangle($point, $currentSector);
      break;

    case 'arc':
      $result = formulaArc($point, $currentSector);
      break;

    default:
      $result = formulaRectangle($point, $currentSector);
  }

  return $result;
}

$pointBottomRightIn = array(
  'x' => 3,
  'y' => -2
);

$pointBottomRightOut = array(
  'x' => 9,
  'y' => -4
);

$pointTopLeftIn = array(
  'x' => -3,
  'y' => 2
);

$pointTopLeftOut = array(
  'x' => -7,
  'y' => 9
);

var_dump( checkPoint($pointBottomRightIn, $area) );
var_dump( checkPoint($pointBottomRightOut, $area) );
var_dump( checkPoint($pointTopLeftIn, $area) );
var_dump( checkPoint($pointTopLeftOut, $area) );

?>