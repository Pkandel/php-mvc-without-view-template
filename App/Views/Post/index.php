<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> Using Model In Post Index</h1>
<?php foreach ($model as $post) { ?> 
	<ul>
		<li>
			<?php echo $post->name;  ?>
		</li>
	</ul>
	<?php } ?>  
</body>
</html>