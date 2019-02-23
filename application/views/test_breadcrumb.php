<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>CI-Breadcrumb - domProjects</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">CI-Breadcrumb</h1>
				<p class="lead">For CodeIgniter 3.x.x</p>
			</div>
		</div>
		<div class="container">
			<h3>Default style</h3>
			<nav aria-label="breadcrumb">
				<?php echo $breadcrumb_default_style; ?>
			</nav>
			<h3>Bootstrap style</h3>
			<nav aria-label="breadcrumb">
				<?php echo $breadcrumb_bootstrap_style; ?>
			</nav>
		</div>
	</body>
</html>