<?php 

declare(strict_types=1);

namespace MVC\Response;

interface ResponseInterface {
  public function sendResponse(): void;
}

?>