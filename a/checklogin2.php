<?php

$email="";
$password="";

if( isset($_POST['email']) ){
	$email=$_POST['email'];
}

if( isset($_POST['pass']) ){
	$password=$_POST['pass'];
}
///database connection
try{
	$conn = new PDO("mysql:host=localhost;dbname=tail;","root","");
}
catch(PDOException $err){
	echo "<script>window.alert('db connection error');</script>";
	echo "<script>location.assign('index.php');</script>";
}


$sqlquery="SELECT * FROM tailor WHERE Email='$email' AND Password='$password'";
//echo $sqlquery;
$object=$conn->prepare($sqlquery);
$object->execute();

if($object->rowCount()==1){
	echo  "<script>location.assign('thome.php');</script>";
}
else{
	echo "<script>location.assign('index.php');</script>";
}

?>