<style>

.menu_option{
	width: 195px;
	height: 50px;
	font-size: 20px;
	padding-left: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	color: antiquewhite;
	background-color:darkred;
	border: 0;
	text-align: left;
	
}

.menu_option:hover{
	cursor: pointer;
	background-color: sandybrown;
}
	

</style>


<table border="0">
	<tr>
		<td><button  class="menu_option" onClick="window.location.href='my_account.php'">Account Settings</button></td>
	</tr>
	<tr>
		<td><button  class="menu_option" onClick="window.location.href='tenants.php'">Tenants List</button></td>
	</tr>
	<tr>
		<td><button  class="menu_option" onClick="window.location.href='manage_tenants.php'">Manage Tenants</button></td>
	</tr>
	<tr>
		<td><button  class="menu_option" onClick="window.location.href='others.php'">Others</button></td>
	</tr>
</table>