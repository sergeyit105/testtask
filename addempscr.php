<?php
class addemp{   
	   public $name, $email;

    function saveemp ()
    {
    include_once("bd.php");
	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
   	$query1 = "SELECT id FROM employee WHERE email='$this->email'";
    $result1 = mysqli_query($link, $query1);
    $myrow1 = mysqli_fetch_array($result1, MYSQLI_BOTH);
    if (!empty($myrow1['id'])) {
    exit ("Извините, введённый вами e-mail уже зарегистрирован. Введите другой логин.");
	}
	else {
    $query2 = "INSERT INTO employee (name, email) VALUES ('$this->name', '$this->email')";
    $result2 = mysqli_query($link, $query2);
    if ($result2) {
    	echo ("Sucsessful");
    }
    }
} 
}

	if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } 
	if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} } 


	$name = stripslashes($name);
    $name = htmlspecialchars($name);
    $name = trim($name);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $email = trim($email);
    $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';

    if(preg_match($regex, $email)){
    	$employee = new addemp;
    	$employee->name = $name;
    	$employee->email = $email;
    	$employee->saveemp();
    }
    else {
        echo("Error");
    }





?>
<!DOCTYPE html>
<html>
<head>
    <title>Added</title>
</head>
<body>
<a href="emplist.php">Employee List</a>
</body>
</html>