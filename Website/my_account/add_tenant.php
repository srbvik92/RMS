<script type="text/javascript">

function add_tenant_action()
{
	var x = document.getElementsByName("name")[0];
	var name = x.value;
	alert(name);
	var x = document.getElementsByName("mobile")[0];
	var mobile = x.value;
	var x = document.getElementsByName("addr")[0];
	var addr = x.value;
	var x = document.getElementsByName("rent")[0];
	var rent = x.value;
	var x = document.getElementsByName("date")[0];
	var date = x.value;
	var x = document.getElementsByName("start_date")[0];
	var start_date = x.value;
	var x = document.getElementsByName("deposit")[0];
	var deposit = x.value;
	
	var info = "name="+name+"&mobile="+mobile+"&addr="+addr+"&rent="+rent+"&date="+date+"&start_date="+start_date+"&deposit="+deposit;
	 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
  };
//if (x=="images")
{
  	xhttp.open("POST", "my_account/add_tenant_action.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send(info);
}
}


function monthly_date()
{
	var y = document.getElementsByName("start_date")[0].value;
	var date = new Date(y);
	document.getElementsByName("date")[0].value=date.getDate();
}


</script>

<?php

include 'connect_db.php';

session_start();

$mobile = $_SESSION['mobile'];

?>

<form method="post">
<table width="486" border="0">
  <tbody>

<?php
//if page is loaded from update tenant click, then load the details of tenant in the corresponding fields and remove fields like date, initial deposit and
if(!empty($_POST['mobile_tenant'])){
	$mobile_tenant = $_POST['mobile_tenant'];
	
	$qry = "select * from tenant where mobile_user = '$mobile' and mobile_tenant = '$mobile_tenant'";
	
	$rs = mysqli_query($con, $qry) OR die(mysqli_error($con));
	
	$rw = mysqli_fetch_row($rs);
	
	$name_tenant = $rw[1];
	$addr_tenant = $rw[3];
	$rent = $rw[4];
	$monthly_date = $rw[5];
	
?>

    <tr>
      <td width="113">Name:</td>
      <td width="363"><input type="text" name="name" required value="<?php echo $name_tenant; ?>"></td>
    </tr>
    <tr>
      <td>Mobile:</td>
      <td><input type="tel" name="mobile" required value="<?php echo $mobile_tenant; ?>"></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><textarea name="addr"><?php echo $addr_tenant; ?></textarea></td>
    </tr>
    <tr>
      <td>Rent:</td>
      <td><input type="number" name="rent" required value="<?php echo $rent; ?>"></td>
    </tr>
    <tr>
      <td>Monthly Date:</td>
      <td><input type="number" name="date" min="1" max="31" value="<?php echo $monthly_date; ?>">If entered 31, it means last day of each month</td>
    </tr>

<?php
}

//else load normal form without any details
else{

?>

    <tr>
      <td width="113">Name:</td>
      <td width="363"><input type="text" name="name" required></td>
    </tr>
    <tr>
      <td>Mobile:</td>
      <td><input type="tel" name="mobile" required></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><textarea name="addr"></textarea></td>
    </tr>
    <tr>
      <td>Rent:</td>
      <td><input type="number" name="rent" required></td>
    </tr>
    <tr>
      <td>Date:</td>
      <td><input type="date" name="start_date" onChange="monthly_date()"></td>
    </tr>
    <tr>
      <td>Monthly Date:</td>
      <td><input type="number" name="date" min="1" max="31">If entered 31, it means last day of each month</td>
    </tr>
    <tr>
      <td>Initial Deposit:</td>
      <td><input type="number" name="deposit" min="0"></td>
    </tr>
    <tr>
     
<?php
}
?>
      <td><input type="button" name="Submit" value="Submit"  onClick="add_tenant_action()"></td>
      <td></td>
    </tr>
  </tbody>
</table>	
</form>