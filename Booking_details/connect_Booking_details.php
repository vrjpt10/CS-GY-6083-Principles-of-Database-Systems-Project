<?php
echo "started";
session_start();
$con = mysqli_connect('localhost', 'root', '','test');


  if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 
$PID=$_SESSION['PID'];
print($PID);
$BOOKINGDATE=$_POST['BOOKINGDATE'];
$MEALPLAN=$_POST['MEALPLAN'];
$CABINCLASS=$_POST['CABINCLASS'];
$SPCLRQST=$_POST['SPCLRQST'];
$ArrAirport=$_POST['ArrAirport'];
$ArrTime=$_POST['ArrTime'];
$DepAirport=$_POST['DepAirport'];
$DepTime=$_POST['DepTime'];


$sql = "INSERT INTO JBVR_BookingDetails (  BOOKINGDATE  ,  MEALPLAN  ,  CABINCLASS  ,  SPCLRQST  ,  ArrAirport  ,  ArrTime  ,  DepAirport  ,  DepTime  ,  PID  ) VALUES ('$BOOKINGDATE', '$MEALPLAN', '$CABINCLASS', '$SPCLRQST', '$ArrAirport', '$ArrTime', '$DepAirport',' $DepTime', '$PID')";

$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Insurance_plans");
  $_SESSION['BOOKINGID'] = mysqli_insert_id($con);
  
}

?>