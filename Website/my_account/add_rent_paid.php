<style>

.add_rent_paid{
	margin: 20px;		
}	
	

</style>

	

</script>

<?php
//check that mobile no of tenant is received or not

?>
<div class="add_rent_paid">
	
<h3>Add rent paid directly or <a href="#" onClick="search_tenant()">Search</a></h3> 


	
<table>
	<tr>
	<td>Mobile No.:</td>
	<td>
		
	<?php //check that mobile no of tenant is received or not, if empty load mobile field as it is, otherwise load value of mobile no of tenant
	if(empty($_POST['mobile_tenant'])){ ?>
		<input type="number" maxlength="10" id="mobile_tenant" onClick="set_date()" required>
	
	<?php }
	else{ ?>
		<input type="number" maxlength="10" id="mobile_tenant" onClick="set_date()" required value="<?php echo $_POST['mobile_tenant'];?>" readonly>
	<?php
		}

		
	?>
	</td>
		
	</tr>
	<tr>
		<td>Amount</td>
		<td><input type="number" min="1" id="amount_of_rent" required></td>
	</tr>
	<tr>
		<td>Date of payment:</td>
		<td><input type="date" id="date_of_rent_paid"></td>
	</tr>
	<tr>
		<td><input type="button" value="Submit" onClick="add_rent_paid_db_action()"></td>
		<td></td>
	</tr>
</table>
	
	
</div>