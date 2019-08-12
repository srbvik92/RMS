<?php

include 'connect_db.php';
session_start();

$mobile = $_SESSION['mobile'];

//echo $mobile;
//get values to insert
$mobile_tenant = $_POST['mobile_tenant'];
$amountRent = $_POST['amount_of_rent'];
$dateOfRent = $_POST['date_of_rent_paid'];
//echo $mobile_tenant;

//check if mobile number of tenant entered is correct or not
$chkQry = "select mobile_tenant from tenant where mobile_user = $mobile and mobile_tenant = $mobile_tenant";

$chkRs = mysqli_query($con, $chkQry);

$chkRw = mysqli_fetch_row($chkRs);

echo $chkRw[0];

//if mobile no is incorrect
if(empty($chkRs)){
	echo "mobile no of tenant is invalid and doesnt match any tenant on your record";
}

//if mobile no is correct then enter into database
else{

//insert into database
$qry = "insert into deposit_history values('$mobile','$mobile_tenant',$amountRent,'$dateOfRent')";

$rs = mysqli_query($con, $qry);

if($rs){
	echo "added successfully";
}
else{
	echo "Some error occured, please try again later";
}
}

?>