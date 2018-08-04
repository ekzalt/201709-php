<?php 

declare(strict_types=1);

namespace MVC\Router;

interface RouterInterface extends RequestAwareInterface {
  public function routeMatch(): bool;
}

?>