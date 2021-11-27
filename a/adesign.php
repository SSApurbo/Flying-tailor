<?php 
session_start();

		try{
			$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
		}
		catch(PDOException $err){
			echo "<script>window.alert('db connection error');</script>";
			echo "<script>location.assign('index.php');</script>";
		}

		$desgn_name = "";
		$price = "";
		if (isset ($_POST["Design_name"])){
			$desgn_name = $_POST["Design_name"];
		}
		if( isset($_POST['price']) ){
			$price=$_POST['price'];
		}
		$query = "INSERT INTO design (Design_name, price) VALUES('$desgn_name','$price' )";
		$stmt=$conn->prepare($query);
		$stmt->execute();
		echo "<script>location.assign('thome.php');</script>";
?>





