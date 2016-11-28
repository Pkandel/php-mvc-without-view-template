<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> Using Model </h1>
<?php foreach ($model as $post) { ?>
	<ul>
		<li>
			<?php echo $post->name;  ?>
		</li>
	</ul>
	<?php } ?>
</body>
</html>