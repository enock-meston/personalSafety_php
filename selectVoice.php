<?php
include 'conn.php';
$phone=$_POST['phonenumber'];
// $allergy=$_POST['allergy'];
// $phone ='0783982872';
if ($con) {
	
		$sqlCheckPhoneNumber=mysqli_query($con,"SELECT * FROM `usertbl` 
			WHERE `phoneNumber` LIKE '$phone'");
		$response = array();
		if (mysqli_num_rows($sqlCheckPhoneNumber)>0) {
		  	// inserting new user query
		  	$status=2; // sending voice request of asking for the help 
		  	$sql_register= mysqli_query($con,"SELECT Allergy FROM `usertbl` WHERE phonenumber='$phone'");
		  	while($row = mysqli_fetch_array($sql_register)){
		  		$response[] = $row;
		  	}
		  } 

		  header('Content-Type: application/json');
    echo json_encode(array("Allergy"=>$response));

}else{
		echo "Connetion Error";
	}
?>