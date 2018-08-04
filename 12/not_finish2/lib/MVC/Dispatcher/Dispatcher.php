<?php 

declare(strict_types = 1);

namespace MVC\Didspatcher;

use MVC\Request\RequestInterfase;
use MVC\Response\ResponseInterfase;
use MVC\Router\RouterInterfase;

class Dispatcher implements DispatcherInterface {

  public function dispatch();
}

?>