<?php


$uname =$email = $pass = '' ;

if (isset($_POST['username'])){
	$uname = $_POST['username'];
}

if (isset($_POST['email'])){
	$email = $_POST['email'];
}

if (isset($_POST['password'])){
	$pass = $_POST['password'];
}

try{
	$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('index.php');</script>";
}
$sql = "SELECT * FROM customer WHERE email = $email";
$stmt = $conn->prepare($sql);
$stmt->execute();

if($stmt->rowCount() == 0){
	$query = "INSERT INTO customer (username,email,password) VALUES('$uname','$email','$pass')";
	$stmt1=$conn->prepare($query);
	$stmt1->execute(); 	
	echo "<script>location.assign('home.php');</script>";
	
}
else{
	echo "<script>location.assign('index.php');</script>";
	echo "<script>window.alert('User Already Exists');</script>";
	}
?>
