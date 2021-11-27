<!DOCTYPE html>

<html>

	<head>
		<style>
		body  {
		  background-image: url("image/back.jpg");
		  background-repeat: no-repeat;
  		  background-size: auto;
		  background-color: #cccccc;
		  background-size: cover;
		  margin: 150px;
		}
		</style>
		<title>My Site</title>
		
		
			<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='main.css')}}"> -->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	</head>

	<body> <center>
		<h1>Tailor</h1>
		<h2> LogIn </h2>
		<form action="checklogin2.php" method="post">
			Email <input type="email" id="email" name="email" placeholder="enter email">
			<br/>
			Password: <input type="password" id="password" name="pass" placeholder="enter password">
			<br/>
			<input type="submit" value="Log In">
		</form>
		<div class="col-md-4 col-md-offset-4 text-center">	
		Customer? <a href="index.php">Login Here</a>
		</div>
		<div class="col-md-4 col-md-offset-4 text-center">	
		Admin? <a href="index3.php">Login Here</a>
		</div>

		<br/>
		<h2>Sign Up</h2>
		<form action="register2.php" method="post">
			
			Username <input type="text" id="uname" name="uname" placeholder="enter username">
			<br/>
			
			Email <input type="email" id="email" name="email" placeholder="enter email">
			<br/>
			
			
			Password: <input type="password" id="password" name="pass" placeholder="enter password" >
			<br/>
			<input type="submit" value="Sign Up">
		</form>
		<div class="col-md-4 col-md-offset-4 text-center">	
		Customer? <a href="index.php">Sign Up Here</a>
		</div>
		<div class="col-md-4 col-md-offset-4 text-center">	
		Admin? <a href="index3.php">Sign Up Here</a>

		</div>
	</center>
	</body>

</html>