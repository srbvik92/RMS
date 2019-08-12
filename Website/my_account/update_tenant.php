<?php

session_start();
include 'connect_db.php';

$mobile = $_SESSION['mobile'];

$mobile_tenant = $_POST['mobile'];

$qry = "select * from tenant where mobile_user=$mobile and mobile=$mobile_tenant";

$rs=mysqli_query($con,$qry) OR die(mysqli_error($con));
$rw=mysqli_fetch_row($rs);

?>

<form method="post">
	
<table width="400" border="0">
  <tbody>
    <tr>
      <td>Name:</td>
      <td><input type="text" name="name" value="<?php echo $rw[1]; ?>"></td>
    </tr>
    <tr>
      <td>Mobile:</td>
      <td><input type="tel" name="mobile" required value="<?php echo $rw[2]; ?>"></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><textarea name="addr"><?php echo $rw[3]; ?></textarea></td>
    </tr>
    <tr>
      <td>Rent:</td>
      <td><input type="number" name="rent" value="<?php echo $rw[4]; ?>"></td>
    </tr>
    
    <tr>
      <td>Monthly Date:</td>
      <td><input type="number" name="date" min="1" max="31" value="<?php echo $rw[5]; ?>"></td>
    </tr>
    <tr>
      <td>Amount Deposited:</td>
      <td><input type="number" name="deposit" min="1"></td>
    </tr>
    <tr>
      <td><input type="button" value="Submit" onClick="modify_tenant_action()"></td>
      <td><input type="button" value="Cancel" onClick="cancel_tenant_action()"></td>
    </tr>
  </tbody>
</table>