<?php 
session_start();
if (empty($_SESSION['login'] and $_SESSION['password'])){
	exit ("Error, this page only for logined users");
}
else {
	if (isset($_POST['id'])) { $id = $_POST['id']; if ($id == '') { unset($id);} } 
	if (isset($_POST['company'])) { $company = $_POST['company']; if ($company == '') { unset($company);} } 
	if (isset($_POST['daybk'])) { $daybk = $_POST['daybk']; if ($daybk == '') { unset($daybk);} } 
	if (isset($_POST['monthbk'])) { $monthbk = $_POST['monthbk']; if ($monthbk == '') { unset($monthbk);} } 
	if (isset($_POST['yearbk'])) { $yearbk = $_POST['yearbk']; if ($yearbk == '') { unset($yearbk);} } 
	if (isset($_POST['timehst'])) { $timehst = $_POST['timehst']; if ($timehst == '') { unset($timehst);} } 
	if (isset($_POST['timemst'])) { $timemst = $_POST['timemst']; if ($timemst == '') { unset($timemst);} } 
	if (isset($_POST['timehend'])) { $timehend = $_POST['timehend']; if ($timehend == '') { unset($timehend);} } 
	if (isset($_POST['timemend'])) { $timemend = $_POST['timemend']; if ($timemend == '') { unset($timemend);} } 
	if (isset($_POST['spec'])) { $spec = $_POST['spec']; if ($spec == '') { unset($spec);} } 
	if (isset($_POST['rec'])) { $rec = $_POST['rec']; if ($rec == '') { unset($rec);} } 
	if (isset($_POST['howof'])) { $howof = $_POST['howof']; if ($howof == '') { unset($howof);} } 
include ("classaddbk.php");
	$book = new addbk;
	$book->id = $id;
	$book->company = $company;
	$book->daybk = $daybk;
	$book->monthbk = $monthbk;
	$book->yearbk = $yearbk;
	$book->timehst = $timehst;
	$book->timemst = $timemst;
	$book->timehend = $timehend;
	$book->timemend = $timemend;
	$book->spec = $spec;
	$book->rec = $rec;
	$book->howof = $howof;
	$book->editbk();
}
?>