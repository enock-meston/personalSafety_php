<?php
require_once 'vendor/autoload.php';
include 'conn.php';
 $phone=$_POST['phonenumber'];
 // $location=$_POST['location'];
// $phone="+250780794274";





$sqlCheckPhoneNumber=mysqli_query($con,"SELECT * FROM `usertbl` 
			WHERE `phoneNumber` LIKE '$phone'");
		$response = array();
		if (mysqli_num_rows($sqlCheckPhoneNumber)>0) {
		  	// inserting new user query
		  	$status=2; // sending voice request of asking for the help 
		  	$sql_register= mysqli_query($con,"SELECT * FROM `usertbl` WHERE phonenumber='$phone'");
		  	while($row = mysqli_fetch_array($sql_register)){
		  		$num=$row['GaudianPhoneNumber'];
		  		$mes=$row['Allergy'];
		  		$fnm=$row['Firstname'];
		  		$lnm=$row['Lastname'];

		  		// echo $row['GaudianPhoneNumber'];
			  $messagebird = new MessageBird\Client('vvGWDXakfjqymim3bL0CTIZV1');
	$message = new MessageBird\Objects\Message;

	$message->originator = $phone;
	$message->recipients = $num; //always is me 
	$message->body = $mes."  is me ".$lnm."  ".$fnm;
	$response = $messagebird->messages->create($message);
	print_r(json_encode($response));
		  	}
		  }






// $messagebird = new MessageBird\Client('vvGWDXakfjqymim3bL0CTIZV1');
// $message = new MessageBird\Objects\Message;

// $message->originator = $phone;
// $message->recipients = $row;
// $message->body = 'Hi! This is your first message enock 4';
// $response = $messagebird->messages->create($message);
// print_r(json_encode($response));

