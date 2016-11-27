<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> <?= htmlspecialchars($name); ?> </h1>
<?php foreach($colours as $colour) { ?>
	<ul>
		<li>
			<?= $colour; ?>
		</li>
	</ul>
	<?php } ?>
</body>
</html>