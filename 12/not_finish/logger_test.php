<?php 

require_once 'autoloader.php';

$logger = new \Logger\FileLogger(__DIR__.'/'.date('Y-m-d').'log.txt');
$logger->debug('debug');
$logger->info('info');
$logger->log(\Logger\Psr\Log\LogLevel::EMERGENCY, 'emergency message');

?>