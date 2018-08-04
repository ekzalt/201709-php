<?php 

trait Destroy {
  protected function create() {
    echo __METHOD__;
  }
}

trait Db {
  private function create() {
    echo __METHOD__;
  }
}

trait Logger {
  private function create() {
    echo __METHOD__;
  }
}

class Creatable {
  use Destroy, Db {
    Db::create insteadof Destroy;
    Destroy::create as public create2;
  }

  public function reCreate() {
    $this->create();
  }
}

$c = new Creatable();
$c->reCreate();
// $c->create();
$c->create2();

?>