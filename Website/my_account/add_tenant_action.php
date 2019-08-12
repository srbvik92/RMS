<?php



include 'connect_db.php';

session_start();

error_reporting(E_ALL);

$mobile_user = $_SESSION['mobile'];

$name = $_POST['name'];
$mobile=$_POST['mobile'];
$addr=$_POST['addr'];
$rent=$_POST['rent'];
$date=$_POST['date'];
$start_date=$_POST['start_date'];
$deposit=$_POST['deposit'];

$adv = 0;

$qry = "insert into tenant values('$mobile_user','$name',$mobile,'$addr',$rent,$date,$adv,'$start_date',$deposit)";

$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));

echo "success";

?>



