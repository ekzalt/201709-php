<a href="index.php">tiles</a> | <b>list</b>

<br/><br/>

<?php foreach ($photos as $photo): ?>
  <a href="photo.php?id=<?=$photo['id']?>">
    <img src="<?=gallery_icon($photo)?>" />
  </a><br/>
<?php endforeach ?>

<br/><br/>

<form method="post" enctype="multipart/form-data">
  <input type="file" name="photo" /><br/>
  <input type="submit" value="load file" />
</form>