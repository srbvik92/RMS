<link rel="stylesheet" type=text/css href=home.css>



<?php

error_reporting(0);

include 'connect_db.php';
session_start();

?>

<div class="header">
	
<?php include 'header.php'; ?>
	
</div>

<div class="main" style="height: 200px;">

<?php 
	
	if(!(strcmp($mobile,"")))
	{
		?>
		
	



<div style="margin-left: 150px; padding-top: 50px;">

<form method="post" action="login_action.php">

<table width="400" border="0">
  <tbody>
    <tr>
      <td height="48">Mobile</td>
      <td><input type="text" name="mobile" width="150" maxlength="10" minlength="10"></td>
    </tr>
    <tr>
      <td height="45">Password:</td>
      <td><input type="password" name="pass" width="150"></td>
    </tr>
    <tr>
      <td height="44"><input type="submit" name="Login" value="Login"></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

	
	
</form>

<?php
	}
	
	else{
		?>
		Your are already logged in. Please go to another link.
		
	<?php
	}
	
?>
</div>

</div>

<div class="footer">
	
<?php include 'footer.php'; ?>	
	
</div>
