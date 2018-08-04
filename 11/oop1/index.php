<?php

// oop php 1

class Test {
  public function __construct($color = 'yellow') {
    $this->color = $color;
  }

  static public function getNew() {
    return new static();
  }
}

class Apple extends Test {
  public $weigth = 10;
  public $color;

  public function __construct($color = 'red') {
    parent::__construct($color);
    $this->color = $color;
  }

  public function getWeigth(): int {
    return $this->weigth;
  }

  public function setWeigth(int $weigth) {
    $this->weigth = $weigth;
    return $this;
  }

  public function __clone() {
    $this->weigth = 10;
  }
}

$test1 = Test::getNew();
$test2 = new Test();

var_dump($test1);
var_dump($test2);
var_dump($test1 == $test2);
var_dump($test1 === $test2);

$apple1 = Apple::getNew();
$weigth = $apple1->setWeigth(25)->getWeigth();

var_dump($apple1);
var_dump($weigth);

$apple2 = new $apple1;

var_dump($apple2);
var_dump($apple2 instanceof Test);

$apple3 = clone $apple1;

var_dump($apple3);

$apple4 = new Apple('green');

var_dump($apple4);

///////////////////////////////////////////////////////////

// oop php 2

class Logger {
  protected $msg = '';

  public function __construct($msg) {
    $this->msg = $msg;
  }

  public function log() {
    echo $this->msg;
  }
}

class MySQLLogger extends Logger {
  /*
  public function log() {
    $this->log_to_mysql();
  }
  */

  protected function log_to_mysql($msg) {
    echo $msg;
  }
}

$msg = __FILE__.':'.__LINE__;
$logger = new MySQLLogger($msg);
$logger->log();

///////////////////////////////////////////////////////////

// oop php 3

class Box {
  const CODE = 'box-xyz';

  public function print_box() {
    // return static::CODE; // parent, self, static
    return self::CODE;
  }
}

class TriangleBox extends Box {
  const CODE = 'box-triangle';
}

$triangleBox = new TriangleBox();

var_dump($triangleBox);
var_dump($triangleBox::CODE);
var_dump($triangleBox->print_box());

final class FinalClass {
  private $FINAL_CLASS = 'FINAL_CLASS';
}

$finalClass = new FinalClass();

var_dump($finalClass);

///////////////////////////////////////////////////////////

// oop php 4

function getNumCalls() {
  static $calls = 0;

  $calls++;

  return $calls;
}

for ($i = 0; $i < 10; $i++) getNumCalls();

echo getNumCalls();

var_dump($calls);

///////////////////////////////////////////////////////////

// oop php 5

class Logger2 {
  static $msg = '';
  static function log() {
    echo static::$msg;
  }
}

function process_start() {
  Logger2::$msg = __FUNCTION__.': START<br>';
  Logger2::log();
}

function process_end() {
  Logger2::$msg = __FUNCTION__.': END<br>';
  Logger2::log();
}

process_start();
process_end();

?>