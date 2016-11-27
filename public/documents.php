<!DOCTYPE html>
<html>
<head>
	<title>rules</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="//resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#accordion" ).accordion({
				collapsible: true
			});
		} );
	</script>
	<style>
	body{
		margin-top:50px;
	}
	</style>
</head>
<body class="container">
	<div id="accordion">
		<h3>App</h3>
		<div>

				<div class="panel panel-info">
					<div class="panel-heading">Controller</div>
					<div class="panel-body">Panel Content</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Models</div>
					<div class="panel-body">Panel Content</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Views</div>
					<div class="panel-body">Panel Content</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Extra</div>
					<div class="panel-body">Panel Content</div>
				</div>


		</div>
		<h3>Core</h3>
		<div>

				<div class="panel panel-info">
					<div class="panel-heading">Route</div>
					<div class="panel-body">Panel Content</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Controller</div>
					<div class="panel-body">Panel Content</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Model</div>
					<div class="panel-body">Panel Content</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Views</div>
					<div class="panel-body">Panel Content</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Error</div>
					<div class="panel-body">Panel Content</div>
				</div>

		</div>
		<h3>logs</h3>
		<div>

				<div class="panel panel-info">
					<div class="panel-heading">Error saving</div>
					<div class="panel-body">Panel Content</div>
				</div>

			</div>
			<h3>public</h3>
			<div>
				<div class="panel panel-info">
					<div class="panel-heading">This is a publicly accesible folder</div>
					<div class="panel-body">Panel Content</div>
				</div>
			</div>
			<h3>vendor</h3>
			<div>
				<div class="panel panel-info">
					<div class="panel-heading">Third party code</div>
					<div class="panel-body">Panel Content</div>
				</div>
			</div>
		</div>
	</body>
	</html>