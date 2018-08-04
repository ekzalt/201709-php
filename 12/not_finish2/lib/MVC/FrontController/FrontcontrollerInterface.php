<?php 

declare(strict_types = 1);

namespace MVC\FrontController;

interface FrontControllerInterface extends DispatcherAwareInterface {
  use DispatcherAwareTrait;
  
  public function run();
}

?>