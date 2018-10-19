<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

	$firstName = $_POST["first_name"];
	$lastName =$_POST["last_name"];
	$brand = $_POST["brand"];
	$model= $_POST["model"];
	$year = $_POST["year"];
	$color = $_POST["color"];
	$fuel=$_POST["fuel"];

	echo $firstName." ".$lastName." ".$brand." ".$model." ".$year." ".$color." ".$fuel;

	$serverName= "localhost";
	$userName= "root";
	$password= "";
	$dbName= "admin";


	$conn = new mysqli($serverName,$userName,$password,$dbName);

	if($conn->connect_error){
		die("Connection failed".$conn->connect_error);
	}


	$stmt = $conn->prepare("INSERT INTO masina ( 
		prenume,nume,marca,model,an,culoare,combustibil) VALUES (?,?,?,?,?,?,?) ");

	$stmt->bind_param("ssssiss",$firstName,$lastName,$brand,$model,$year,$color,$fuel);

	$stmt->execute(); 

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("Location:cars.php");
	?>
</body>
</html>