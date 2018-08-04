<?php 

declare(strict_types=1);

namespace MVC\Response;

interface ResponseAwareInterface {
  public function setRouter(ResponseInterface $response);
}

?>