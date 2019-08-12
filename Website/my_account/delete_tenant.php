<?php

session_start();
include 'connect_db.php';

$mobile = $_SESSION['mobile'];

$mobile_tenant = $_POST['mobile'];

$qry = "delete from tenant where mobile_user=$mobile and mobile=$mobile_tenant";

$rs=mysqli_query($con,$qry) OR die(mysqli_error($con));

include 'tenants_list.php';

?>