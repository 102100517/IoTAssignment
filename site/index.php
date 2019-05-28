<!DOCTYPE html>
<html lang="en">
<head>
	<title>IoT Personal Assignment</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<?php
		require 'vendor/autoload.php';
		$client = new MongoDB\Client("mongodb://localhost:27017");
		$collection = $client->mydb->smartcar;

		$result = $collection->find([ 'car' => 'golf'],[]);

		foreach($result as $entry){
			echo $entry['OilTemp'], "\n";
			echo $entry['EngineLoad'], "\n";
			echo $entry['RPM'], "\n";
			echo $entry['Voltage'], "\n";
		}
	?>
	<header>
		<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
		<a href="index.php" class="navbar-brand">IoT Personal Assignment</a>
		</nav>
	</header>
	
	<main class="container lead">
		<div class="row">
			<h1 class="display-1">Welcome!</h1>
		</div>
		
		<div class="row">
			<p>
			The current personal project that is the product of many man-hours<br />
			Developed by: James Hassall
			</p>
		</div>
	</main>
</body>
</html>
