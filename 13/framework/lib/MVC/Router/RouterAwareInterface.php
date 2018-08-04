<?php 

declare(strict_types=1);

namespace MVC\Router;

interface RouterAwareInterface {
  public function setRouter(RouterInterface $router);
}

?>