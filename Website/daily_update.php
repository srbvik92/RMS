<?php

session_start();
include 'connect_db.php';

$date = date("d");

$month = date("m");

$qry = "update tenant set adv_or_due = adv_or_due-rent where date = ".date("d");

$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));

?>


Echo success