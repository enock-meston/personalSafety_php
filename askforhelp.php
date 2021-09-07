<?php
include 'conn.php';
$phone=$_POST['phonenumber'];
// $allergy=$_POST['allergy'];
// $phone ='0783982872';
if ($con) {
	
		$sqlCheckPhoneNumber=mysqli_query($con,"SELECT * FROM `usertbl` 
			WHERE `phoneNumber` LIKE '$phone'");
		if (mysqli_num_rows($sqlCheckPhoneNumber)>0) {
		  	// inserting new user query
		  	$status=2; // sending voice request of asking for the help 
		  	$sql_register= mysqli_query($con,"UPDATE `usertbl` SET `Status`='$status' WHERE phonenumber='$phone'");

		  	if ($sql_register) {
		  		echo "your_Voice_sent";
		  	}else{
		  		echo "Failed to send Voice";
		  	}
		  } 

}else{
		echo "Connetion Error";
	}
?>