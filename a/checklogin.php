<?php
session_start(); 
$email="";
$password="";

if( isset($_POST['email']) ){
	$email=$_POST['email'];
}

if( isset($_POST['pass']) ){
	$password=$_POST['pass'];
}
$_SESSION['email']=$email;
///database connection
try{
	$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('index.php');</script>";
}

//$_SESSION['email'] = $email;

$sqlquery="SELECT * FROM customer WHERE Email='$email' AND Password='$password'";
//echo $sqlquery;
$object=$conn->prepare($sqlquery);
$object->execute();

if($object->rowCount()==1){
	echo "<script>location.assign('home.php');</script>";
}
else{

	echo "<script>location.assign('index.php');</script>";
}

?>