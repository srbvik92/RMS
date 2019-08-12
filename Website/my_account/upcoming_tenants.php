<?php

include '../connect_db.php';
session_start();

$mobile = $_SESSION['mobile'];

//select list of tenants whose due date is within next 10 days

$today = date("Y-m-d"); 

$today = DateTime::createFromFormat("Y-m-d", $today);

$day =  $today->format("d");

echo $day;

$max_day = $day+10;

$qry = "select* from tenant where mobile_user = $mobile and date<$max_day";

$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));


?>
<table>
	<tr>
      <td>Name:</td>
      <td>Mobile:</td>
      <td>Address</td>
      <td>Select;</td>
      <td>&nbsp;</td>
    </tr>
    
<?php 
	  
	  while($rw=mysqli_fetch_row($rs))
	  {  ?>
		<tr>
			<td><?php echo $rw[1]; ?></td>
			<td><?php echo $rw[2]; ?></td>
			<td><?php echo $rw[3]; ?></td>
			<td>
			
			<input type="radio" name="mobile_tenant_radio" value="<?php echo $rw[2]; ?>" id="<?php echo $rw[2]; ?>"></td>
			<td></td>
			
		</tr>
	 <?php }
	  
?>
</table>