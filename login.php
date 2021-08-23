<?php
include 'conn.php';
// $fname=$_POST['firstname'];
// $lname=$_POST['lastname'];
$phone=$_POST['phonenumber'];
$pass=$_POST['password'];
// $address=$_POST['address'];
// $allergy=$_POST['allergy'];

// $fname='Enock';
// $lname='Meston';
// $phone='0783982872';
// $pass='Enock1212';
// $address='kigali';
// $allergy='help';
// $isValidEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
if ($con) {

	// code...
	// if (strlen($pass)>40||strlen($pass)<6) {
		// echo "password must be less than 20 and more than 6 Charactors";
	// }else{
		$sqlCheckPhoneNumber=mysqli_query($con,"SELECT * FROM `usertbl` 
			WHERE `phoneNumber` LIKE '$phone'");
		if (mysqli_num_rows($sqlCheckPhoneNumber)>0) {
		  	$loginQuery="SELECT * FROM `usertbl` WHERE `phoneNumber` LIKE '$phone' AND `password` LIKE '$pass'";
		  	$query=mysqli_query($con,$loginQuery);
			if (mysqli_num_rows($query)>0) {
				echo "Login_Success";
			}else{
				echo "Wrong Password";
			}
		  }else{
		echo "Connetion Error";
	}
}
?>