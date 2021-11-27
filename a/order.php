<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
		<style>
		body  {
		  background-image: url("image/light.png");
		  background-repeat: no-repeat;
  		  background-size: auto;
		  background-color: #cccccc;
		  background-size: cover;
		  margin:150px;
		}
		</style>
		<title>My Site</title>
		
		
			<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='main.css')}}"> -->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	</head>
<body> <center>
	<h1>Order Placement</h1>
	<h2>Insert Measurements</h2>
	
	<form action="measurements.php" method="post">
			Chest <input type="number" step="0.01" id="chest" name="chest" placeholder="enter">
			<br/>
			Waist <input type="number" step="0.01" id="waist" name="waist" placeholder="enter">
			<br/>
			Sleeve <input type="number" step="0.01"  id="sleeve" name="sleeve" placeholder="enter">
			<br/>
			Neck <input type="number" step="0.01"  id="neck" name="neck" placeholder="enter">
			<br/>
			Other <input type="text" id="other" name="other" placeholder="enter additional details">
			<br/>
			<input type="submit" value="Confirm">
		</form>
	</center>
</body>
</html>