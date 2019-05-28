<?php
	include 'connection.php';
	
	$result = $collection->find(['car' => 'golf'],[]);	

	echo '<div class="row">';

	foreach($result as $entry){
		echo '	<div class="col"><p> Oil Temperature ' . $entry['OilTemp'] . 'C </p></div>';
		echo '	<div class="col"><p> Engine Load ' . $entry['EngineLoad'] . '% </p></div>';
		echo '	<div class="col"><p> RPM ' . $entry['RPM'] . '</p></div>';
		echo '	<div class="col"><p> Voltage ' . $entry['Voltage'] . 'V </p></div>';		
	}
	echo '</div>';
?>
