<?php
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
?>

<html>
<head>
	<title>Add Employee</title>
</head>
<body>
	<form action="addempscr.php" method="post">
		<label>Enter name of employee:</label></br>
		<input type="text" name="name"></br>
		<label>Enter email of employee:</label></br>
		<input type="text" name="email"></br>
		<input type="submit" name="submit"></br>
	</form>

</body>
</html>
