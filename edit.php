<?php

	if (isset($_POST['newname'])) { $newname = $_POST['newname']; if ($newname == '') { unset($newname);} } 
	if (isset($_POST['newemail'])) { $newemail = $_POST['newemail']; if ($newemail == '') { unset($newemail);} } 
	include_once("bd.php");
   	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));	
   	$query = "SELECT id FROM employee WHERE name = 'Sergey'";
   	$result = mysqli_query($link, $query);
   	$id = mysqli_fetch_array($result);

		if(!empty($newname)){
		$query2 = "UPDATE employee SET name = '$newname' where id = '$id[0]'";	
   		$result2 = mysqli_query($link, $query2);
   		if($result2) {
   			echo("Sucsses");
   		}
		}

		if(!empty($newemail)){
		$query3 = "UPDATE employee SET email = '$newemail' where id = '$id[0]'";	
   		$result3 = mysqli_query($link, $query3);
   		if($result3){
   		echo ("Sucsess");
   		}
		

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edited</title>
</head>
<body>
	<a href="emplist.php">Employee List</a>
</body>
</html>