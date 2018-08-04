<?php 

namespace pagination\pagination_interface;

interface IPagination {
  public function setCurrenPage(int $page);
  public function setPerPage(int $page);
  public function setTotalElements(int $total);
  public function setNumLinks(int $links);
  public function setLinksRange(): array;
}

?>