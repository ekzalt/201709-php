<?php 

namespace pagination;

interface IPagination {
  public function setCurrenPage(int $page);
  public function setPerPage(int $page);
  public function setTotalElements(int $total);
  public function setNumLinks(int $links);
  public function setLinksRange(): arr;
}

class Pagination implements IPagination {
  protected $current_page = 1;
  protected $per_page = 2;
  protected $total_elements = 1;
  protected $num_links = 7;
  protected $links_range = [];

  public function setCurrenPage(int $page) {
    $this->current_page = $page;
    return $this;
  }

  public function setPerPage(int $page) {
    $this->per_page = $page;
    return $this;
  }

  public function setTotalElements(int $total) {
    $this->total_elements = $total;
    return $this;
  }

  public function setNumLinks(int $links) {
    $this->num_links = $links;
    return $this;
  }

  public function setLinksRange(): arr {
    return $this->links_range;
  }
}

?>