<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Yey, working!</h1>

<?php

	$serverName= "localhost";
	$userName= "root";
	$password= "";
	$dbName= "admin";


	$conn = new mysqli($serverName,$userName,$password,$dbName);

	if($conn->connect_error){ //conn=coneiune
		die("Connection failed".$conn->connect_error);
	}


	$query=mysqli_query($conn,'SELECT * FROM masina'); //yuhu just testing
?> 
	<table id="masina">
		<tr> 
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Car Brand</th>
			<th>Car Model</th>
			<th>Manufactured</th>
			<th>Color</th>
			<th>Fuel</th>

		</tr>
		
	
<?php

	while($row = mysqli_fetch_array($query)) {
		echo"<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['prenume']."</td>";
		echo "<td>".$row['nume']."</td>";
		echo "<td>".$row['marca']."</td>";
		echo "<td>".$row['model']."</td>";
		echo "<td>".$row['an']."</td>";
		echo "<td>".$row['culoare']."</td>";
		echo "<td>".$row['combustibil']."</td>";

		echo "</tr>";
	}

	//mysqli_stmt_close($stmt);
	mysqli_close($conn);
	//header('location:cars.php');
	
?>
</table>
</body>
</html>