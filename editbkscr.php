<?php 
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
else {
include ("classaddbk.php");
	$book = new Addbk($_POST);
	$book->editbk();
}
?>
