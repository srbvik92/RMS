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
}function add_tenant() {
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
	
	var info = "name="+name+"&mobile="+mobile+"&addr="+addr+"&rent="+rent+"&date="+date;
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

function update_tenant_rent()
{
	var x = document.getElementsByName("mob");
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

function cancel_tenant_action()
{
	
}



//add rent paid by the tenant
/*function add_rent_paid()
{	
	console.log("add_rent_paid");
	alert("add_rent_paid");
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main_content").innerHTML = this.responseText;
    }
	};
	
	xhttp.open("POST", "my_account/add_rent_paid.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	xhttp.send();
} */