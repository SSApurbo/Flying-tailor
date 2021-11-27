<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
		<style>
		body  {
		  background-image: url("image/6.png");
		  background-repeat: no-repeat;
  		  background-size: auto;
		  background-color: #cccccc;
		  background-size: cover;
		  margin: 150px;
		}
		</style>
		<title>My Site</title>
		
		
			<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='main.css')}}" -->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	</head>
<body> <center>
	<h1>Add Design</h1>
	<h2>Insert Details</h2>

	
	<form action="adesign.php" method="post">
			Name <input type="string"  id="Design_name" name="Design_name" placeholder="enter">
			<br/>
			Price <input type="number"  id="price" name="price" placeholder="enter">
			<br/>
			
			<input type="submit" value="Confirm">
		</form>
	</center>
</body>
</html>