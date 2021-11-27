<?php 
session_start();
		$email=$_SESSION['email'];
		try{
			$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('index.php');</script>";
		}

				$chest = "" ;
				$waist = "" ;
				$sleeve = "";
				$neck = "";
				$other = "";
				
				//echo "$tailor_id[]";
				if (isset ($_POST["chest"])){
					$chest = $_POST["chest"];
				}
				if( isset($_POST['waist']) ){
					$waist=$_POST['waist'];
				}
				if( isset($_POST['sleeve']) ){
					$sleeve=$_POST['sleeve'];
				}
				if( isset($_POST['neck']) ){
					$neck=$_POST['neck'];
				}
				if( isset($_POST['other']) ){
					$other=$_POST['other'];
				}

		/*$sql= "INSERT INTO order (Tailor_ID) Values ($tailorid) ";
		$stmt = $conn->prepare($sql);
		$stmt->execute();*/
		
		
		$query = "INSERT INTO measurement (customer_email,chest,waist,sleeve,neck,other) VALUES('$email','$chest','$waist','$sleeve','$neck','$other')";
		$stmt=$conn->prepare($query);
		$stmt->execute();
		echo "<script>location.assign('home.php');</script>";





?>
