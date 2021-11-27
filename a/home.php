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
		  font-family: ui-rounded;
		  margin: 150px;
		  /*font-family: 'Open Sans', sans-serif;*/
		 /* font-family: Arial, Helvetica, sans-serif;*/
		 /*font-family: Georgia, serif;*/
		 /*font-family: "Gill Sans", sans-serif;*/
		 /*font-family: "Goudy Bookletter 1911", sans-serif;*/
		 /*font-family: Lucida Console, Courier, monospace;*/
		}
		</style>
		<title>My Site</title>
		
		
			<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='main.css')}}"> -->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	</head>
<body> <center>
	<h2>Home page</h2>
	
	 
	<?php 
	 
	 try{
		$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
	}
	catch(PDOException $err){
		echo "<script>window.alert('db connection error');</script>";
		echo "<script>location.assign('index.php');</script>";
	}

	 $uname = $rat = $tailor_id = "";
	 if( isset($_POST['Username']) ){
		$uname=$_POST['Username'];
	 }

	if( isset($_POST['rating']) ){
		$rat=$_POST['rating'];
	}
	if( isset($_POST['tailor_id']) ){
		$tailor_id=$_POST['tailor_id'];
	}

	
	$sql = "SELECT tailor_id, Username, Rating  FROM tailor";

	$stmt=$conn->prepare($sql);
	$stmt->execute();
	
	
	//$array = array();
	/*$result = $conn->query($sql)->fetchall();
	foreach ($result as $uname) {
	    echo $uname['Username'];
	}*/
	
		 
		

		if($stmt->rowCount() > 0)
		
		echo "<table border> \n";
		echo "<th>Tailor</th> <th>Rating</th> <th>Action</th> \n";
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				// $_POST = $row["tailor_id"];
				$tailorid=$row["tailor_id"];
				echo "<tr>";
				echo " <td> $uname".$row["Username"] ."</td> "; 
				echo "<td> <center> $rat".$row["Rating"]." </center></td>" ;
				echo "<td> <center> <input type='button' name='submit' onclick='location.assign(\"design.php?id=$tailorid\")' value='GO'>"."<br>" . "</center></td>";
				echo "</tr>";//$rat".$row["Rating"] . "<input type='button' name='submit' onclick='location.assign(\"design.php?id=$tailorid\")' value='GO'>"."<br>" ;
					
					
			}
			echo "</table> \n";
			
		}
		
		?> 
			
		<div class="col-md-4 col-md-offset-4 text-center">	
			<br>
			<h4> Want to logout? <a href="logout.php">LogOut</a>  </h4> 
		</div>


</body>
</html>