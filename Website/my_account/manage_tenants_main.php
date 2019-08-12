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

<!--<script src="actions.js" type="text/javascript"></script> -->


<script type="text/javascript">

//loading add tenant page in  the browser
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

//insert tenant in database
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

//load add tenant page with the info coming from update tenant page
function update_tenant_info_page(){
	//get the checked radio button to get mobile no of the selected row
	var x = document.getElementsByName("mobile_tenant_radio");
	var mobile_tenant;
	//get value of checked option
	for(var i = 0, length=x.length; i<length; i++)
	{
		if(x[i].checked)
			mobile_tenant = x[i].value;
	}
	
	//alert(mob);
	
	if(mobile_tenant==undefined){
		alert("Please select a row");
	}
	
	//send tenant mobile no to load into add tenant page for updation
	var info = "mobile_tenant="+mobile_tenant;
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
  	xhttp.send(info);
}
}
//se	
function monthly_date()
{
	var y = document.getElementsByName("start_date")[0].value;
	var date = new Date(y);
	document.getElementsByName("date")[0].value=date.getDate();
}

//calling overdue tenant php page to show overdue tenant
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

//add rent paid when clicked add rent paid directly and user wants to enter rent directly from tenant's mobile no
function add_rent_paid()
{	
	//console.log("add_rent_paid");
	//alert("add_rent_paid");
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
	};
	
	xhttp.open("POST", "my_account/add_rent_paid.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send();
}
	
//this function is used when user searches for tenant and clicks on that tenant to add rent, so to load mobile no of tenant in mobile field
function add_rent_paid_with_mobile(mobile_tenant)
{	
	//console.log("add_rent_paid");
	//alert("add_rent_paid");
	
	//get the checked radio button to get mobile no of the selected row
	var x = document.getElementsByName("mobile_tenant_radio");
	var mobile_tenant;
	//get value of checked option
	for(var i = 0, length=x.length; i<length; i++)
	{
		if(x[i].checked)
			mobile_tenant = x[i].value;
	}
	
	//alert(mob);
	
	if(mobile_tenant==undefined){
		alert("Please select a row");
	}
	
	var info = "mobile_tenant="+mobile_tenant;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
	};
	
	xhttp.open("POST", "my_account/add_rent_paid.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send(info);
}
	

//set date to today's date by default in add rent paid page and max date to current date
function set_date(){
	//alert("bubi");
	 var today = new Date();
	  var dd = today.getDate();
	  var mm = today.getMonth()+1; //January is 0!
	  var yyyy = today.getFullYear();
 	if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

	today = yyyy+'-'+mm+'-'+dd;
	document.getElementById("date_of_rent_paid").value = today;
	document.getElementById("date_of_rent_paid").setAttribute("max", today);
	
}
	
//load search tenant page when clicked on search in add_rent_paid page
function search_tenant(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
	};
	
	xhttp.open("POST", "my_account/search_tenant_for_rent_paid.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send()
}

// insert rent paid by the tenant to the database
function add_rent_paid_db_action(){
	//alert("bubi");
	var mobile_tenant = document.getElementById("mobile_tenant").value;
	console.log(mobile_tenant);
	var amount_rent = document.getElementById('amount_of_rent').value;
	var date_of_rent = document.getElementById("date_of_rent_paid").value;
	
	var info = "mobile_tenant="+mobile_tenant+"&amount_of_rent="+amount_rent+"&date_of_rent_paid="+date_of_rent;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
	};
	
	xhttp.open("POST", "my_account/add_rent_paid_db_action.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send(info);
	
}
	
//search tenant by name function, sent name data to search_tenant_action page	
function search_tenant_name(){
	//alert("search tenant name");
	var tenant_name = document.getElementById("tenant_name").value;
	
	var info = "tenant_name="+tenant_name+"&s=1&e=5";
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
	};
	
	xhttp.open("POST", "my_account/search_tenant_action.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send(info);
}
	
//load tenant action page on click of tenant action button
function tenants_action(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
	};
	
	xhttp.open("POST", "my_account/tenants_list.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send()
	
}

//load page for update tenant
function update_tenant_rent()
{
	var x = document.getElementsByName("mobile_tenant_radio");
	var mob;
	//get value of checked option
	for(var i = 0, length=x.length; i<length; i++)
	{
		if(x[i].checked)
			mob = x[i].value;
	}
	
	//alert(mob);
	
	if(mob==undefined){
		alert("Please select a row");
	}
	else {
	var info = "mobile="+mob
	var xhttp = new XMLHttpRequest();
	 xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
  };
//if (x=="images")
{
  	xhttp.open("POST", "my_account/update_tenant.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send(info);
}
}
}
	
//display tenants whose rent pay date is in within next 10 days
function upcoming_tenants(){
	var xhttp = new XMLHttpRequest();
	 xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
  };


  	xhttp.open("POST", "my_account/upcoming_tenants.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send();
}

</script>
	
<?php



?>


<table width="400" border="0">
  <tbody>
    <tr>
      <td><button  class="menu_option1" onClick="add_tenant()">Add Tenant</button></td>
      <td><button  class="menu_option1" onClick="add_rent_paid()">Add Rent Paid</button></td>
      <!--<td><button  class="menu_option1" onClick="window.location.href='tenants.php'">Tenants Action</button></td> -->
      <td><button  class="menu_option1" onClick="tenants_action()">Tenants Action</button></td>
      <td><!--<button  class="menu_option1" onClick="search_tenant()">Modify Tenant</button> --></td>
    </tr>
  </tbody>
</table>

<div id="main_content"></div>

