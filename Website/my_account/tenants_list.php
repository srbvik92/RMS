<style>

.action_button
{
	width: 100px;
	height: 30px;
	font-size: 10px;
	padding-left: 5px;
	padding-top: 5px;
	padding-bottom: 5px;
	color: antiquewhite;
	background-color:darkred;
	border: 0;
	text-align: left;
	
}

.tenant_list{
	margin: 20px 0px 0px 20px;
}
	
.tenant_list_heading{
	font-size: 22px;	
	padding-left: 50px;
	padding-top: 20px;
	padding-bottom: 20px;
	background-color: #56140D;
	color: white;
}

</style>



<script>

function delete_tenant()
{
	
	var x = document.getElementsByName("mob");
	var mob;
	//get value of checked option
	for(var i = 0, length=x.length; i<length; i++)
	{
		if(x[i].checked)
			mob = x[i].value;
	}
	
	alert(mob);
	var info = "mobile="+mob;
	
		 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
  };
//if (x=="images")
{
  	xhttp.open("POST", "my_account/delete_tenant.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send(info);
}
}
	
 
	
function modify_tenant_action()
{
	var x = document.getElementsByName("name")[0];
	var name = x.value;
	//alert(name);
	var x = document.getElementsByName("mobile")[0];
	var mobile = x.value;
	var x = document.getElementsByName("addr")[0];
	var addr = x.value;
	var x = document.getElementsByName("rent")[0];
	var rent = x.value;
	var x = document.getElementsByName("date")[0];
	var date = x.value;
	//var x = document.getElementsByName("start_date")[0];
	//var start_date = x.value;
	var x = document.getElementsByName("deposit")[0];
	var deposit = x.value;
	
	var info = "name="+name+"&mobile="+mobile+"&addr="+addr+"&rent="+rent+"&date="+date+"&deposit="+deposit;
	 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
  };
//if (x=="images")
{
  	xhttp.open("POST", "my_account/update_tenant_action.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send(info);
}
}



</script>


<?php

error_reporting(0);
include 'connect_db.php';

session_start();

$mobile = $_SESSION['mobile'];

//select all tenants and display to user

$qry = "select * from tenant where mobile_user = $mobile";

$rs = mysqli_query($con,$qry) OR die(mysqli_error($con));



?>

<div id="main_content">

<div class="tenant_list_heading">
	List of tenants are displayed. Please act as you need
	
</div>

<div class="tenant_list">

<table width="760" border="0">
  <tbody>
  <tr>
  <td>Enter Name:</td>
   <td><input type="text" id="tenant_name"></td>
		<td><button onClick="search_tenant_name()">Search</button></td>
   </tr>
    <tr>
      <td>Name:</td>
      <td>Mobile:</td>
      <td>Address</td>
      <td>Select;</td>
      <td>&nbsp;</td>
    </tr>
  <input type="radio" name="mob" value="null" id="null" hidden>
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
   <tr>
      <td><button class="action_button" onClick="delete_tenant()">Delete Selected</button></td>
      <td><button class="action_button" onClick="update_tenant_rent()">Update Rent</button></td>
      <td><button class="action_button" onClick="update_tenant_info_page()">Update Tenant Info</button></td>
      <td>Select;</td>
      <td>&nbsp;</td>
    </tr>
 
  
  
  
  </tbody>
</table>
</div>
</div>