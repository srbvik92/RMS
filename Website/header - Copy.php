<style>

ul {
	position: absolute;
	top: 148px;
  list-style-type: none;
  margin: 0;
  padding: 0;
	
}

li {
  display: inline;
	float: left;
	
}
	
li:last-child {
  border-right: none;
}

a,b {
	height: 40px;
	width: 140px;
	font-size: 20px;
	text-align: center;
	text-decoration: none;
	color: white;
  display: block;
	padding: 10px;
	margin: auto;
	text-align: center;
	line-height: 40px;
	
  
  background-color:saddlebrown;
}
	
li a:hover {
  background-color: sandybrown;
}

</style>

<?php

include 'connect_db.php';
session_start();

error_reporting(0);

$mobile=$_SESSION['mobile'];
		
if(!(strcmp($mobile,"")))
{
?>


<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="login.php">Login</a></li>
  <li><a href="register.php">Register</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact Us</a></li>
</ul>

<?php
}
else
{
	$qry ="select name from user where mobile=$mobile";
	$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));
	$rw = mysqli_fetch_row($rs);
?>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="my_account.php">My Account</a></li>
  <li><a href="login.php">Logout</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="contact.php">Contact Us</a></li>
  <li><b><?php
	//echo name of user with welcome
	echo "Welcome ".$rw[0]; ?></b></li>
</ul>

<?php
}
?>





