<?php 

declare(strict_types=1);

namespace MVC\Didspatcher;

use MVC\Request\RequestInterfase;
use MVC\Response\ResponseInterfase;
use MVC\Router\RouterInterfase;

interface DispatcherInterface extends RequestAwareInterfase, ResponseAwareInterfase, RouterAwareInterfase {

  public function dispatch();
}

?>