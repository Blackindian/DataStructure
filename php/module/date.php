<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>data php</title>
</head>
<body>
	<?php 
		echo date("F j, Y"); 

		#echo date(format, timestamp);
		echo "<br/>";

		// Prints the day, date, month, year, time, AM or PM
		echo date("l jS of F Y h:i:s A"); 
	?>
</body>
</html>