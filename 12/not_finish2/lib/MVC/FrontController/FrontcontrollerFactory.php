<?php 

declare(strict_types = 1);

namespace MVC\FrontController;

class FrontControllerFactory implements FrontControllerInterface {
  public function create(): FrontControllerInterface {
    $front_controller = new \MVC\FrontController\FrontController();
    $dispatcher = DispatcherFactoryAbstract::crate();
    $front_controller->setDispatcher($dispatcher);
  }
}

?>