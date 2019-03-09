<?php 
	class Addbk 
	{
		private $id = 0;
		private $company ="";
		private $daybk ="";
		private $monthbk="";
		private $yearbk="";
		private $timehst="";
		private $timemst="";
		private $timehend="";
		private $timemend="";
		private $spec="";
		private $rec="";
		private $howof="";
		
		function __construct($bkRecord) {
			if (isset($bkRecord['id'])) { 
        		$this->id = $bkRecord['id'];
         		if ($this->id == '') { unset($this->id);}
      			} 
			if (isset($bkRecord['company'])) { 
        		$this->company = $bkRecord['company'];
         		if ($this->company == '') { unset($this->company);}
      			}
			if (isset($bkRecord['daybk'])) { 
        		$this->id = $bkRecord['daybk'];
         		if ($this->daybk == '') { unset($this->daybk);}
      			}
			if (isset($bkRecord['monthbk'])) { 
        		$this->monthbk = $bkRecord['id'];
         		if ($this->monthbk == '') { unset($this->monthbk);}
      			}
			if (isset($bkRecord['yaerbk'])) { 
        		$this->yearbk = $bkRecord['yearbk'];
         		if ($this->yearbk == '') { unset($this->yearbk);}
      			}
			if (isset($bkRecord['timehst'])) { 
        		$this->timehst = $bkRecord['timehst'];
         		if ($this->timehst == '') { unset($this->timehst);}
      			}
			if (isset($bkRecord['timemst'])) { 
        		$this->timemst = $bkRecord['timemst'];
         		if ($this->timemst == '') { unset($this->timemst);}
      			}
			if (isset($bkRecord['timehend'])) { 
        		$this->timehend = $bkRecord['timehend'];
         		if ($this->timehend == '') { unset($this->timehend);}
      			}
			if (isset($bkRecord['timemend'])) { 
        		$this->timemend = $bkRecord['timemend'];
         		if ($this->timemend == '') { unset($this->timemend);}
      			}
			if (isset($bkRecord['spec'])) { 
        		$this->spec = $bkRecord['spec'];
         		if ($this->spec == '') { unset($this->spec);}
      			}
			if (isset($bkRecord['rec'])) { 
        		$this->rec = $bkRecord['rec'];
         		if ($this->rec == '') { unset($this->rec);}
      			}
			if (isset($bkRecord['howof'])) { 
        		$this->howof = $bkRecord['howhf'];
         		if ($this->howof == '') { unset($this->howof);}
      			}
    			}
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
