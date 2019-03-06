<?php
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
else{
	include_once("bd.php");
   	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
   	$query = "SELECT name FROM employee"; 
   	$result = mysqli_query($link, $query);
	while ($row = mysqli_fetch_row($result)) {
	    echo "<tr>";
	        for ($j = 0; $j < count($row) ; ++$j) {
	        	echo "<a href='infemp.php?name=$row[$j]'>".$row[$j]."</a>  <a href='editemp.php?name=$row[$j]'>EDIT</a> <a 	 onclick=\"return confirm('Are sure?')\" href='rememp.php?name=$row[$j]'>REMOVE</a><br>";
	        }
	    echo "</tr>";
	}
}


?>
<html>
<head>
	<title>Employee</title>
</head>
<body>
	<form action="addemp.php">
	<input type="submit" name="add" value="Add a new Employee">		
	</form>

	<form action="brdrm.php">
	<input type="submit" name="add" value="Main Page">		
	</form>

</body>
</html>