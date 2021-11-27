<?php 
session_start();
$tailorid=$_GET['id'];

//echo "<script>window.alert('$tailorid');</script>";
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
		  margin:60px;
		}
		</style>
		<title>My Site</title>
		
		
			<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='main.css')}}"> -->
			<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	</head>
<body> <center>
	<h1>Designs</h1>
	<?php 
	  	try{
			$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('index.php');</script>";
		}


		$tailor_id = "" ;
		$dsgn_id = "" ;
		$dsgn_name = "";
		
		$dsgn_image = "";
		$dsgn_price = "";
		//echo "$tailor_id[]";
		if (isset ($_POST["tailor_id"])){
			$tailor_id = $_POST["tailor_id"];
		}
		if( isset($_POST['Design_ID']) ){
			$dsgn_id=$_POST['Design_ID'];
		}
		if( isset($_POST['Image']) ){
			$dsgn_image=$_POST['Image'];
		}
		if( isset($_POST['Design_Name']) ){
			$dsgn_name=$_POST['Design_Name'];
		}
		
		if( isset($_POST['price']) ){
			$dsgn_price=$_POST['price'];
		}
		

		//$query= "SELECT * FROM tailor_design AS t1 WHERE t1.Tailor_ID = $tailor_id && t1.Design_ID = $Design_ID " ;
		//$query = "SELECT * from design join tailor_design on tailor_design.Design_ID = design.Design_ID ";
		// WHERE tailor_design.tailor_design = $tailorid ";
		// $query = "SELECT Design_Name, Price 
		// 			FROM Design JOIN tailor_design ON Design.Design_ID = tailor_design.Design_ID
		// 			JOIN tailor ON tailor_design.Tailor_ID = tailor.Tailor_ID 
		// 			WHERE tailor.Tailor_ID = $tailorid";
		$query = "SELECT * FROM DESIGN ";
		$stmt=$conn->prepare($query);
		$stmt->execute();
		
		

		?>
		<form action="order.php" method="post">

		
		<?php 
		if($stmt->rowCount() > 0)

		{
			echo "<table border> \n";
			echo "<th>Design Name</th> <th>Price </th> <th>Image</th> <th> Action </th> \n";

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				//if($tailor_id == $row["tailor_id"]){
					 $i = "image/".$row["Image"];
					 echo "<tr>";
					 echo "<td> $dsgn_name".$row["Design_Name"] . "</td>"; 
					  // " $dsgn_image" .($row["Image"]) . 
					 echo " <td> $dsgn_price".$row["Price"] . "</td>"; 
					  
					 echo "<td><img src='".$i."'width='150' height='150'></td>";
					 echo "<td> <center> <input type='submit' name='submit' value='Order'> " ."<br>" . "</center> </td> "; 
					

					 echo "</tr>";
					//echo "<script>location.assign('source.php');</script>";
					/*$query = "SELECT * from Design WHERE Design_id = $dsgn_id "; 
						$stmt = $conn->prepare( $query );
						$stmt->execute();
					
    					}*/

				//}


			}
		}

		

		

		?>
		</form>
</center>
	<!-- <img src="St.png" width = "300" height = "300" >
</body>  -->
</body>
</html>