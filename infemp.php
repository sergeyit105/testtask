<?php
if (isset($_GET['name'])) { $name = $_GET['name']; if ($name == '') { unset($name);} } 
include_once("bd.php");
   	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
   	$query = "SELECT email FROM employee WHERE name='$name'"; 
   	$result = mysqli_query($link, $query);
   	$res = mysqli_fetch_array($result);
   	echo ("Name: ".$name."<br>");
   	echo ("E-mail: ".$res[0]."<br>");
?>