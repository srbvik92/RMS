
<script>



</script>

<?php

session_start();
include 'connect_db.php';

$mobile_user = $_SESSION['mobile'];

$qry = "select * from tenant where total_rent>total_deposit";

$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));



?>


<div id="main_content">

<table width="760" border="0">
  <tbody>
    <tr>
      <td>Name:</td>
      <td>Mobile:</td>
      <td>Address</td>
      <td>Amount Overdue</td>
      <td>Select</td>
      
    </tr>
  <input type="radio" name="mob" value="null" id="null" hidden>
<?php 
	  
	  while($rw=mysqli_fetch_row($rs))
	  {  ?>
		<tr>
			<td><?php echo $rw[1]; ?></td>
			<td><?php echo $rw[2]; ?></td>
			<td><?php echo $rw[3]; ?></td>
			<td><?php echo $rw[6]-$rw[8]; ?></td>
			<td>
			
			<input type="radio" name="mob" value="<?php echo $rw[2]; ?>" id="<?php echo $rw[2]; ?>"></td>
			
			
		</tr>
	 <?php }
	  
?>
   <tr>
      <td><button class="action_button" onClick="delete_tenant()">Delete Selected</button></td>
      <td><button class="action_button" onClick="update_tenant_page()">Update Rent</button></td>
      <td>Update Rent</td>
      <td>Select;</td>
      <td>&nbsp;</td>
    </tr>
 
  
  
  
  </tbody>
</table>
</div>