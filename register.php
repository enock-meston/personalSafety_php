<?php
include 'conn.php';
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$phone=$_POST['phonenumber'];
$pass=$_POST['password'];
$address=$_POST['address'];
$allergy=$_POST['allergy'];

// $fname='Enock';
// $lname='Meston';
// $phone='0783121456';
// $pass='123456';
// $address='kigali';
// $allergy='help';
// $isValidEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
if ($con) {
	// code...
	if (strlen($pass)>40||strlen($pass)<6) {
		echo "password must be less than 20 and more than 6 Charactors";
	}else{
		$sqlCheckPhoneNumber=mysqli_query($con,"SELECT * FROM `usertbl` 
			WHERE `phoneNumber` LIKE '$phone'");
		if (mysqli_num_rows($sqlCheckPhoneNumber)>0) {
		  	// code...
		  	echo "Phone Number is Allready used!";
		  }else{
		  	// inserting new user query
		  	$status=1;
		  	$sql_register= mysqli_query($con,"INSERT INTO `usertbl`(`Firstname`, `Lastname`, `phoneNumber`, `password`, `address`, `Allergy`, `Status`) 
		  		VALUES ('$fname','$lname','$phone','$pass','$address','$allergy','$status')");

		  	if ($sql_register) {
		  		echo "Successfully_Registered";
		  	}else{
		  		echo "Failed to register";
		  	}
		  }  
	}
}else{
		echo "Connetion Error";
	}
?>