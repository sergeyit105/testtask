<?php 
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
else {
	$id = $_GET['id'];	
	$arrday = [];
    for ($i=0; $i<31; $i++){
    	$arrday[] = $i+1;
    }	

    $months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');

    $arrh = [];
    for ($d=0; $d < 24 ; $d++) { 
    $arrh[] = $d;
    }

    $arrm = [];
    for ($j=0; $j < 61 ; $j++) { 
    $arrm[] = $j;
    }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
</head>
<body>

	<form action="editbkscr.php" method="post">
	<input type="hidden" name="id" value = <?php echo ($id); ?>>
	<p><label>1. Booked for:<br></label>
	<select required name="company">
    <option value="All companies">All companies</option>
    <option value="First company">First company</option>
    <option value="Second company">Second company</option>
    <option value="Third company">Third company</option>
   </select></p>

   	<p><label>2. I would like to book this meeting:<br></label>
   	<select required name="daybk">
    <?php 
    for ($i1=0; $i1<count($arrday); $i1++) { 
    	    echo "<option 'value=$arrday[$i1]'>".$arrday[$i1]."</optin>";
    }
    ?>
   </select>
   <select required name="monthbk">
   	<?php 
   	    for ($s=0; $s<count($months); $s++) { 
    	    echo "<option 'value=$months[$s]'>".$months[$s]."</optin>";
    }
    ?>
   </select>
      <select required name="yearbk">
      	<option value="2019">2019</option>
      </select>
</p>

<p>
	<label>3. Specify what the time and end fo the meeting:<br></label>
	<select required name="timehst">
		<?php 
   	    for ($d1=0; $d1<count($arrh); $d1++) { 
    	    echo "<option 'value=$arrh[$d1]'>".$arrh[$d1]."</optin>";	
    	    }	
		?>
	</select>
	<select required name="timemst">
		<?php 
   	    for ($j1=0; $j1<count($arrm); $j1++) { 
    	    echo "<option 'value=$arrm[$j1]'>".$arrm[$j1]."</optin>";	
    	    }	
		?>		
	</select>
</p>

<p>
	<select required name="timehend">
		<?php 
   	    for ($d1=0; $d1<count($arrh); $d1++) { 
    	    echo "<option 'value=$arrh[$d1]'>".$arrh[$d1]."</optin>";	
    	    }	
		?>
	</select>
	<select required name="timemend">
		<?php 
   	    for ($j1=0; $j1<count($arrm); $j1++) { 
    	    echo "<option 'value=$arrm[$j1]'>".$arrm[$j1]."</optin>";	
    	    }	
		?>		
	</select>	
</p>

<p>
	<label>4. Enter the specifics for the meeting:<br></label>
	<textarea rows="10" cols="45" name="spec">Enter</textarea>
</p>

<p>
	<label>5. Is this going to be a recuring event:<br></label>
	<p><input type="radio" name="rec" value="0" checked>No </p>	
	<p><input type="radio" name="rec" value="1"> Yes</p>
</p>

<p>
	<label>6. If it is recuring specify weekly or monthly: </label>		
	<p><input type="radio" name="howof" value="1" checked>Weekly</p>
	<p><input type="radio" name="howof" value="2">Monthly</p>
</p>
<input type="submit" name="submit" value="Submit">
	</form>


</body>
</html>