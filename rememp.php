<?php
	$name = $_GET['name'];
	include_once("bd.php");
	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
	$query1 = "DELETE FROM employee where name = '$name'";
	$result1 = mysqli_query($link, $query1);

	if($result1){
		echo("Sucsess");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Remove</title>
</head>
<body>
<a href="emplist.php">Employee List</a>
</body>
</html>