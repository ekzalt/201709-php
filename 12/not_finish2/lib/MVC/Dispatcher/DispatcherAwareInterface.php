<?php 

declare(strict_types = 1);

namespace MVC\Request;

interface DispatcherAwareInterface {
  public function setDispatcher(DispatcherInterface $dispatcher);
}

?>