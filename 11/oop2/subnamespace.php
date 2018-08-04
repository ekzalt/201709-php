<?php 

namespace A {
  class User {
    public $name = 'Vasya';
  }
}

namespace B {
  use A\User;
  use A\User as ClassUser;

  $user1 = new User();
  $user2 = new ClassUser();
  $user3 = new \A\User();

  var_dump($user1);
  var_dump($user2);
  var_dump($user3);
}

/////////////////////////////////////////////////////////

/*
namespace App\Model\User;

class UserModel {
  protected $name = 'model';

  public function getName(): string {
    return $this->name;
  }
  
  public function setName(string $name): UserModel {
    $this->name = $name;
    return $this;
  }
}
*/

?>