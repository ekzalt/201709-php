<?php 

declare(strict_types = 1);

namespace MVC\Didspatcher;

use MVC\Didspatcher\DidspatcherInterface;

trait DispatcherAwareTrait {
  protected $dispatcher;

  public function setDispatcher(DispatcherInterface $dispatcher) {
    $this->$dispatcher = $dispatcher;
    return $this;
  }

  public function getDispatcher(DispatcherInterface $dispatcher) {
    return $this->$dispatcher;
  }
}

?>