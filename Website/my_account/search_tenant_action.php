<?php

include '../connect_db.php';
session_start();
	
$mobile = $_SESSION['mobile'];

$tenant_name = $_POST['tenant_name'];

$qry = "select * from tenant where name like '%".$tenant_name."%'";

$rs = mysqli_query($con,$qry);

?>

<table>
	<tr>
     <td>Name:</td>
      <td>Mobile:</td>
      <td>Address</td>
      <td>Amount Overdue</td>
      <td>Select</td>
	</tr>


<?php 
	  
	  while($rw=mysqli_fetch_row($rs))
	  {  ?>
		<tr>
			<td><?php echo $rw[1]; ?></td>
			<td><?php echo $rw[2]; ?></td>
			<td><?php echo $rw[3]; ?></td>
			<td><?php echo $rw[8]-$rw[6]; ?></td>
			<td><input type="radio" name="mobile_tenant_radio" value="<?php echo $rw[2]; ?>" id="<?php echo $rw[2]; ?>"></td
		></tr>
		
		<?php }
?>		
		
		<tr>
			<td><button onClick="add_rent_paid_with_mobile()">Add Rent</button></td>
		</tr>
</table>
	
