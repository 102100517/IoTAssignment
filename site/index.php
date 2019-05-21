<!--<!DOCTYPE html>
<html lang="en">
<head>
	<title>IoT Personal Assignment</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<header>-->
		<?php
		$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

		$filter = ['id' => ['$gt' => 0]]
		$options = [
			'projection' => ['_id' => 0],
		 ];
		$query = new MongoDB\Driver\Query($filter,$options);
		$cursor = $manager->executeQuery('db.smartcar', $query);

		foreach($cursor as $document)
		{
			var_dump($document);
		}
		/*try
		{
			//new DB connection
			$m = new Mongo('localhost');
			//connect to database
			$db = $m->mydb;
			//a new smartcar collection obj
			$collection = $db->smartcar
			//fetch all the products
			$cursor = $collection->find();

			//how many results
			$num_docs = $cursor->count();

			if($num_docs > 0)
			{
				//loop over all the elements
				foreach($cursor as $obj)
				{
					echo 'Action: ' . $obj['Action'] . "\n";
					echo 'RPM: ' . $obj['RPM'] . "\n";
					echo 'Engine Load' . $obj['Engine Load'] . "\n";
					echo "\n";
				}
			}
			else
			{
				//if no products are found, we show this message
				echo "No entries found \n";
			}
			$m->close();
		}
		catch(MongoConnectionException $e)
		{
			//if there is error and catching
			echo $e->getMessage();
		}
		catch(MongoException $e)
		{
			//if there is error and catching
			echo $e->getMessage();
		}*/	
		?>
		<!--<nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">
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
</html> -->
