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
$deposit=$_POST['deposit'];

$adv = 0;

$qry = "select total_deposit from tenant where mobile_user='$mobile_user' and mobile='$mobile'";

$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));

$rw=mysqli_fetch_row($rs);

$deposit = $deposit+$rw[0];


$qry1 = "update tenant set name='$name', mobile='$mobile', address='$addr', rent=$rent, date=$date, total_deposit=$deposit where mobile_user='$mobile_user' and mobile='$mobile'";

$rs1 = mysqli_query($con,$qry1) OR die(mysqli_error($con));

echo "success";

?>


