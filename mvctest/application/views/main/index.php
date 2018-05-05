<!-- <p>My MVC</p> -->

<!-- <p>Имя:<b><?php echo $name; ?></b></p>-->
<!--<p>Возраст:<b><?php echo $age; ?></b></p> -->
<p><?=$titel?></p>


<?php foreach ($news as $val): ?>
	<h3><?php echo $val['title'];?></h3>
<p><?=$val['title'];?></p>
<p><img src ="<?=$val['image'];?>" width="165" height="200" /></p>
<hr>
<?php endforeach; ?>


