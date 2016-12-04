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
					<div class="panel-body">
						<pre>
1. Have to define namespace.
2. Controller class should extends Controller from core
3. To use MVC view should use \Core\View
4. Method should have suffix as Action like indexAction
5. We can use render static method from \core\view to access the views
		It has got five overloadings
		a. View::render()
			This will automatically finds the right view for the controller and action.
		b.View::render("home/index.php")
			This will render the specific view.
		c. View::render(Object)
			This will render the correct view with model object
		d.View::render('controller/action') or View::render('admin/controller/action')
		d. View::render("home/index.php",Object)
			This will render the specific view with model object
6. We can get the id and other value from url as
		echo $_GET['name']; //This is for ?name = "prakash"
		echo $this->route_params['id']; // This is for id /users/12/edit
7. We can define method to execute before and after the controller action method executes
	To do so 
	we have to override the before and after method of parent controller by
		protected function before()
	{
		//do some check if not valid return false
		//do some check if valid return true
		//same applies to after method
	}

						</pre>

					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Models</div>
					<div class="panel-body">
						<pre>
1. It has to extend \Core\Models and just use the template. This is all for now.


						</pre>



					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">					
					Views
					</div>
					<div class="panel-body">
						<pre>
1. View receives the arrray of objects as "model" and have to loop through model and print out the result.
2.Mvc convention should be follwed to make folder and files.
					</pre>	
					</div>
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