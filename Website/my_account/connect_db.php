<?php

global $con;
$con=mysqli_connect("localhost", "root", "");
mysqli_select_db($con,'rms') OR die(mysqli_error($con));

?>