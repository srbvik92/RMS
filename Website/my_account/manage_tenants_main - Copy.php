<style>
	
.menu_option1{
	width: 155px;
	height: 50px;
	font-size: 15px;
	padding-left: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	color: antiquewhite;
	background-color:darkred;
	border: 0;
	text-align: left;
	
}

.menu_option1:hover{
	cursor: pointer;
	background-color: sandybrown;
}
	
</style>

<script src="actions.js"></script>


<script type="text/javascript">
function add_tenant() {
	//alert("3");
	//alert (rel_year);
	
	//alert(info);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
  };
//if (x=="images")
{
  	xhttp.open("POST", "my_account/add_tenant.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send();
}
}
	
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

function overdue_tenant()
{
	 var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
  };
//if (x=="images")
{
  	xhttp.open("POST", "my_account/overdue_tenant.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send();
}
}

</script>
	
<?php



?>


<table width="400" border="0">
  <tbody>
    <tr>
      <td><button  class="menu_option1" onClick="add_tenant()">Add Tenant</button></td>
      <td><button  class="menu_option1" onClick="overdue_tenant()">Overdue Tenants</button></td>
      <td><button  class="menu_option1" onClick="window.location.href='my_account.php'">Delete Tenant</button></td>
      <td><button  class="menu_option1" onClick="window.location.href='my_account.php'">Modify Tenant</button></td>
    </tr>
  </tbody>
</table>

<div id="main_content"></div>

