<?
include 'conn.php';
$pass=$_POST['Enock1212'];
$phone=$_POST['0783982872'];

$sqlCheckPhoneNumber="SELECT * FROM `usertbl` WHERE `phoneNumber`='$phone'";
$query =mysqli_query($con,$sqlCheckPhoneNumber);

if (mysqli_num_rows($query)>0) {
$sqlLogin ="SELECT * FROM `usertbl` WHERE phoneNumber='$phone' AND password='$pass'";
$loginQuery= mysqli_query($con,$sqlLogin);
if (mysqli_num_rows($loginQuery)>0) {
echo "Login_Success";
}else{
echo "Unknown Number...";
}
}
?>