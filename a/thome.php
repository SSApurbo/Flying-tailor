<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
		<style>
		body  {
		  background-image: url("image/im.png");
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
	<h1>Home Page</h1>
	<h3>Your Designs</h3>
	<?php 

		try{
			$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('index.php');</script>";
		}
		$dsgn_id = "" ;
		$dsgn_name = "";
		$dsgn_price = "";
		



		$query = "SELECT  * FROM design ";
		$stmt = $conn->prepare($query);
		$stmt->execute();

		//echo "Designs";

		if($stmt->rowCount() > 0)
		{
			echo "<table border> \n";
			echo "<th>Design Name </th> <th>Price</th> \n";
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				echo "<tr>";
				echo "<td> $dsgn_name".$row["Design_Name"] ."</td>";
				echo "<td> $dsgn_price".$row["Price"].  "</td>"; 
				echo "</tr>";

				
					
			}
			echo "</table> \n";
		}

		$query1 = "SELECT * From measurement";
		$stmt1 = $conn->prepare($query1);
		$stmt1->execute();

		?> <h3>Your Orders </h3>
		<?php
		$i = $stmt->rowCount();
		echo "<table border> \n";
		echo "<th>Email </th> \n";
		echo "<th>Chest </th> \n";
		echo "<th>Waist </th> \n";
		echo "<th>Sleeve </th> \n";
		echo "<th>Neck </th> \n";
		echo "<th>Others </th> \n";
		while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
			
			// while ($i > 0) {
			echo "<tr>";
			echo  "<td>".$row1['customer_email']."</td>";
			echo  "<td>".$row1['Chest']."</td>";
			echo  "<td>".$row1['Waist']."</td>";
			echo  "<td>".$row1['Sleeve']."</td>";
			echo  "<td>".$row1['Neck']."</td>";
			echo  "<td>".$row1['other']."</td>";
			echo "</tr>";
		}
		echo "</table> \n";

	?>
	<div class="col-md-4 col-md-offset-4 text-center">	
		<br>
		<h4> Add new design ? <a href="add.php">Add</a>  </h4> 
	</div>
	<div class="col-md-4 col-md-offset-4 text-center">	
		<br>
		<h4> Want to logout? <a href="logout.php">LogOut</a>  </h4> 
	</div>
</center>
</body>
</html>