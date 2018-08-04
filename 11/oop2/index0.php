<?php 

/*
// work code

require_once 'subnamespace.php';
$user = new \App\Model\User\UserModel();
$user->setName('Ivan');
echo $user->getName();
*/

////////////////////////////////////////////////////////

/*
// work code

namespace Run;
require_once 'subnamespace.php';
use App\Model\User\UserModel;

$user = new UserModel();
$user->setName('Ivan');
echo $user->getName();
*/

////////////////////////////////////////////////////////

spl_autoload_register(function($name) {
  $path = str_replace('\\', DIRECTORY_SEPARATOR, $name);
  $file = __DIR__.DIRECTORY_SEPARATOR.$path.'.php';

  if(file_exists($file)) {
    include_once $file;
  }
});

$user = new app\model\user\UserModel();
var_dump($user);

?>