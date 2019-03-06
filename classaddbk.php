<?php 
	class addbk 
	{
		public $id, $company, $daybk, $monthbk, $yearbk, $timehst, $timemst, $timehend, $timemend, $spec, $rec, $howof;
		function savebk() {
			include_once ('bd.php');
			$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
			if ($this->timehst < 8 and $this->timehst > 17) {
				if ($this->timehst > $this->timehend){
						exit ("Error, enter, the correct time");
				}
				
			} 
			else {
				$query = "SELECT id FROM booked Where day = '$this->daybk' AND month = '$this->monthbk' and timehst >= '$this->timehst' AND timehend <= '$this->timehend' ";
				$result = mysqli_query($link, $query);
				if ($result){
				$rows = mysqli_num_rows($result);
				$row = mysqli_fetch_row($result);
    			if (!empty($row)) {
    				exit ("Error, this time is already booked");
				}
		
    			}
			$query1 = "INSERT INTO booked (company, day, month, year, timehst, timemst, timehend, timemend, spec, rec) VALUES ('$this->company', '$this->daybk', '$this->monthbk', '$this->yearbk', '$this->timehst', '$this->timemst', '$this->timehend', '$this->timemend', '$this->spec', '$this->rec')";
			$result1 = mysqli_query($link, $query1);
			if ($result1){
				echo "Sucsses";
			}
			if($this->rec == 1){
				$query2 = "UPDATE booked SET howof = '$this->howof'";
				mysqli_query($link, $query2);
			}
			}

			

		}

		function editbk() {
				include_once ('bd.php');
				$link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
				if ($this->timehst < 8 and $this->timehst > 17) {
				if ($this->timehst > $this->timehend){
						exit ("Error, enter, the correct time");
				}
				
			}
			$query1 = "UPDATE booked SET company = '$this->company', day = '$this->daybk', month = '$this->monthbk', year = '$this->yearbk', timehst = '$this->timehst', timemst = '$this->timemst', timehend = '$this->timehend', timemend = '$this->timemend', spec = '$this->spec', rec = '$this->rec' WHERE id = '$this->id'";
			$result1 = mysqli_query($link, $query1);
			if ($result1){
				echo "Sucsses";
			}
			} 
		}
	
?>
