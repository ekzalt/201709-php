<?php

// MySQL

$connection = mysqli_connect('127.0.0.1', 'login', 'password', 'test_db');

if ($connection == false) {
  echo 'No connection :( <br>';
  echo mysql_error();
  exit();
}

$result = mysqli_query($connection, "SELECT * FROM `tasks`");

if (mysql_num_rows($result) == 0) {
  echo 'No tasks';

} else {
  echo 'Total tasks: ' . mysql_num_rows($result);
  ?>

    <ul>
      <?php
        while ($task = mysqli_fetch_assoc($result)) {
          // $articles_count = mysql_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `articles` WHERE `category_id` = " . $task['id']);
          // $articles_count_result = mysql_fetch_assoc($articles_count);
          // print_r($articles_count_result);
          // echo $articles_count_result['total_count'];

          echo '<li>' . $task['content'] . '</li>';
        }
      ?>
    </ul>

  <?php
}

mysqli_close($connection);

?>
