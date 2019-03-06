<?php
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
else {
	$currentMonth = 'Mar.';
	include_once 'bd.php';
	$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
	$query6 = "SELECT day FROM booked WHERE month = '$currentMonth' GROUP BY day";
    $result6 = mysqli_query($link, $query6);
	if($result6)
	{
    $rows6 = mysqli_num_rows($result6); 
  	for ($p=0; $p < $rows6; $p++) { 
  		    $row6 = mysqli_fetch_row($result6);
            for ($p1 = 0 ; $p1 < count($row6); ++$p1) 
            {	
    $query1 = "SELECT id FROM booked WHERE day = '$row6[$p1]' AND month = '$currentMonth'";
	$result1 = mysqli_query($link, $query1);
	if($result1)
	{
    $rows1 = mysqli_num_rows($result1); 
    for ($i = 0 ; $i < $rows1 ; ++$i)
    {
        $rowid = mysqli_fetch_row($result1);
            for ($i1 = 0 ; $i1 < count($rowid); ++$i1) 
            {	
            	$rowid[$i1];
            	$query2 = "SELECT timehst from booked WHERE id = '$rowid[$i1]'";
            	$query3 = "SELECT timemst from booked WHERE id = '$rowid[$i1]'";
            	$query4 = "SELECT timehend from booked WHERE id = '$rowid[$i1]'";
            	$query5 = "SELECT timemend from booked WHERE id = '$rowid[$i1]'";
             	$result2 = mysqli_query($link, $query2);
             	$result3 = mysqli_query($link, $query3);
             	$result4 = mysqli_query($link, $query4);
             	$result5 = mysqli_query($link, $query5);
            	if($result2){
            		$rows2 = mysqli_num_rows($result2);
            		for ($j = 0; $j < $rows2; ++$j)
            		{
            			$ths = mysqli_fetch_row($result2);
            			$tms = mysqli_fetch_row($result3);
            			$the = mysqli_fetch_row($result4);
            			$tme = mysqli_fetch_row($result5);
            			for ($j1=0; $j1 < count($ths); ++$j1) {
            			echo "<a href='infbk.php?id=$rowid[$i1]'>".$row6[$p1]." of ".$currentMonth.":".$ths[$j1].":".$tms[$j1]."-".$the[$j1].":".$tme[$j1]."</a>";
            			 } 

            		}
            	} 
            }
         echo "<br>";   	
    }

	}
}
}
}
	$dayofmonth = date('t');
  $day_count = 1;
  $num = 0;
  for($i = 0; $i < 7; $i++)
  {
    $dayofweek = date('w',
                      mktime(0, 0, 0, date('m'), $day_count, date('Y')));
    $dayofweek = $dayofweek - 1;
    if($dayofweek == -1) $dayofweek = 6;
    if($dayofweek == $i)
    {
      $week[$num][$i] = $day_count;
      $day_count++;
    }
    else
    {
      $week[$num][$i] = "";
    }
  }
  while(true)
  {
    $num++;
    for($i = 0; $i < 7; $i++)
    {
      $week[$num][$i] = $day_count;
      $day_count++;
      if($day_count > $dayofmonth) break;
    }
    if($day_count > $dayofmonth) break;
  }
  echo "<table border=1>";
  for($i = 0; $i < count($week); $i++)
  {
    echo "<tr>";
    for($j = 0; $j < 7; $j++)
    {
      if(!empty($week[$i][$j]))
      {

       	echo "<td>".$week[$i][$j]."</td>";
       
      }
      else echo "<td>&nbsp;</td>";
    }
    echo "</tr>";
  } 
  echo "</table>";

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
</head>
<body>
<a href="emplist.php">Employee List</a>
<a href="addbk.php">Book it!</a>
	

</body>
</html>
