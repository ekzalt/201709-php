<?php 

namespace app\model\user;

class UserModel {
  protected $name = 'model';

  public function getName(): str {
    return $this->name;
  }
  
  public function setName(str $name): UserModel {
    $this->name = $name;
    return $this;
  }
}

?>