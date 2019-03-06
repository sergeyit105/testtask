<?php
	if (isset($_GET['name'])) { $name = $_GET['name']; if ($name == '') { unset($name);} } 

	include_once("bd.php");
   	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
   	$query = "SELECT email FROM employee WHERE name='$name'"; 
   	$result = mysqli_query($link, $query);
   	$email = mysqli_fetch_array($result);


   	//echo ($id[0]);
?>
<html>
<head>
	<title>Edit</title>
</head>
<body>
	<form method="post">
		<label>Edit Name (Current name: <?php echo($name) ?> )</label>
		<input type="text" name="newname">
		<input type="submit" name="sub">
	</form>

	<form method="post">
		<label>Edit e-mail (Current e-mail: <?php echo($email[0]) ?>) </label>
		<input type="text" name="newemail">
		<input type="submit" name="submit">
	</form>


</body>
</html>

<?php 
	if (isset($_POST['newname'])) { $newname = $_POST['newname']; if ($newname == '') { unset($newname);} } 
	if (isset($_POST['newemail'])) { $newemail = $_POST['newemail']; if ($newemail == '') { unset($newemail);} } 	
   	$query1 = "SELECT id FROM employee WHERE name = '$name'";
   	$result1 = mysqli_query($link, $query1);
   	$id = mysqli_fetch_array($result1);

		if(!empty($newname)){
		$query2 = "UPDATE employee SET name = '$newname' where id = '$id[0]'";	
   		$result2 = mysqli_query($link, $query2);
   		if($result2) {
   			header('Location: http://localhost/JunePHP/emplist.php');
   		}
		}

		if(!empty($newemail)){
		$query3 = "UPDATE employee SET email = '$newemail' where id = '$id[0]'";	
   		$result3 = mysqli_query($link, $query3);
   		if($result3){
   			header('Location: http://localhost/JunePHP/emplist.php');
   		}
		

	}
?>

