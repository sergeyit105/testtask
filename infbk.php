<?php 
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
else {
	$id = $_GET['id'];
	include_once 'bd.php';
	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
	$query = "SELECT * FROM booked where id = '$id'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	if($result)
	{
    $rows = mysqli_num_rows($result);
    echo "<table><tr><th>Id</th><th>Company</th><th>Day</th><th>Month</th><th>Year</th><th>Time start</th><th>Time start minutes</th><th>Time end</th><th>Time end minutes</th><th>Specificate</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 10; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
}
$edit = 'Edit Book';
$remove = 'Remove Book';
echo "<a href='editbk.php?id=$id'>".$edit."</a><br>";
echo "<a onclick=\"return confirm('Are sure?')\" href='rembk.php?id=$id'>".$remove."</a><br>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<a href="brdrm.php">Main Page</a>
</body>
</html>