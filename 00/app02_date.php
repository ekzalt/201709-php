<?php

// Date

echo date('d.m.Y H:i:s');
echo time();

$start_date = '2017-08-20 16:33:10';
$start_date_timestamp = strtotime($start_date);
echo $start_date_timestamp;

$diff = time() - $start_date_timestamp;
$days_passed = floor( $diff / (60 * 60 * 24) );

echo 'между ' . date('d.m.Y H:i:s', $start_date_timestamp) . ' и ' . date('d.m.Y H:i:s') . ' прошло ' . $days_passed . ' дней.';

?>
