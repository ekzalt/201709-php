<?php
/*echo "I am request.php<br>";
echo __FILE__, "<br>";
print_r($_GET);
echo "<br>";
print_r($_POST);
echo "<br>";
print_r($_REQUEST);*/

$storagePath = "./storage.txt";
$fileContent = file_get_contents($storagePath);

if (!$fileContent) $arPhones = [];
else $arPhones = unserialize($fileContent);

// $arPhones = (!$fileContent) ? [] : unserialize($fileContent);

if(isset($_POST['submit'])){
  // echo "Hello, {$_POST['username']}!";

  if($_POST['name'] && $_POST['price'] && $_POST['description']) {
    $arPhones[] = [
      'name' => $_POST['name'],
      'price' => $_POST['price'],
      'description' => $_POST['description']
    ];
    
    $fileContent = serialize($arPhones);
    file_put_contents($storagePath, $fileContent);
  }
}

?>