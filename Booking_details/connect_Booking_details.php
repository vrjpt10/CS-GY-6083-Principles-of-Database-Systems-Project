<?php
echo "started";
session_start();
$con = mysqli_connect('localhost', 'root', '','test');


  if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 
$CID=$_SESSION['cid'];
$BOOKINGDATE=$_POST['BOOKINGDATE'];
$ArrAirport=$_POST['ArrAirport'];
$ArrTime=$_POST['ArrTime'];
$DepAirport=$_POST['DepAirport'];
$DepTime=$_POST['DepTime'];


$sql = "INSERT INTO JBVR_BookingDetails (  BOOKINGDATE,  ArrAirport  ,  ArrTime  ,  DepAirport  ,  DepTime  ,  CID  ) VALUES ('$BOOKINGDATE', '$ArrAirport', '$ArrTime', '$DepAirport',' $DepTime', '$CID')";

$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Add_Passenger");
  $_SESSION['BOOKINGID'] = mysqli_insert_id($con);
  
}

?>