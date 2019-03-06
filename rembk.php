<?php 
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
else {
	$id = $_GET['id'];
	$query1 = "DELETE FROM booked where id = '$id'";
	$result1 = mysqli_query($link, $query1);
	if($result1){
		echo("Sucsess");
	}
}
	
?>