<?php 

declare(strict_types=1);

namespace MVC\Request;

interface RequestAwareInterface {
  public function setRouter(RequestInterface $request);
}

?>