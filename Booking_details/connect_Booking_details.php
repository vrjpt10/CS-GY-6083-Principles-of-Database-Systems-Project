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

//Prevent SQL Sanization using real escape string
$BOOKINGDATE1=mysqli_real_escape_string($con,$BOOKINGDATE);
$ArrAirport1=mysqli_real_escape_string($con,$ArrAirport);
$ArrTime1=mysqli_real_escape_string($con,$ArrTime);
$DepAirport1 =mysqli_real_escape_string($con,  $DepAirport);
$DepTime1=mysqli_real_escape_string($con, $DepTime);

htmlspecialchars($ArrAirport1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($DepAirport1, ENT_QUOTES, 'UTF-8');

$sql = "INSERT INTO JBVR_BookingDetails (  BOOKINGDATE,  ArrAirport  ,  ArrTime  ,  DepAirport  ,  DepTime  ,  CID  ) VALUES ('$BOOKINGDATE1', '$ArrAirport1', '$ArrTime1', '$DepAirport1',' $DepTime1', '$CID')";

$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Add_Passenger");
  $_SESSION['BOOKINGID'] = mysqli_insert_id($con);
  
}

?>