<style>

/* Position the navbar container inside the image */
.container {
  position: absolute;
  margin: 20px;
	margin-top: 40px;
  width: auto;
}

/* The navbar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Navbar links */
.topnav a, b {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
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


<!-- top menus -->
<div class="container">
 <div class="topnav">
  <a href="home.php">Home</a>
  <a href="login.php">Login</a>
  <a href="register.php">Register</a>
  <a href="about.php">About</a>
  <a href="contact.php">Contact Us</a>
  </div>
</div>

<?php
}
else
{
	$qry ="select name from user where mobile=$mobile";
	$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));
	$rw = mysqli_fetch_row($rs);
?>


<!-- top menus -->
<div class="container">
 <div class="topnav">
  <a href="home.php">Home</a>
  <a href="my_account.php">My Account</a>
  <a href="logout.php">Logout</a>
  <a href="about.php">About</a>
  <a href="contact.php">Contact Us</a>
  <b><?php
	//echo name of user with welcome
	echo "Welcome ".$rw[0]; ?></b></li>
</div>
</div>

<?php
}
?>





