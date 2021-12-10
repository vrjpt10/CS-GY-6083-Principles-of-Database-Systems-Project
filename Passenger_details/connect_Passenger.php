<?php
session_start();
echo "started";
$con = mysqli_connect('localhost', 'root', '','test');


 if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 
$CID = $_SESSION["cid"];
print($CID);
$PTYPE= $_POST['PTYPE'];
$PFNAME=$_POST['PFNAME'];
$PMNAME=$_POST['PMNAME'];
$PLNAME=$_POST['PLNAME'];
$DOB=$_POST['DOB'];
$PNATIONALITY=$_POST['PNATIONALITY'];
$PGENDER=$_POST['PGENDER'];
$PASSPORTNO=$_POST['PASSPORTNO'];
$PPEXPDATE=$_POST['PPEXPDATE'];



//$sql = "INSERT INTO JBVR_PASSENGER VALUES ('$customer_ID','$Customer_type', '$street', '$city','$zip_code', '$state', '$country', '$email','$country_code','$number', '$gender', '$nationality','$ECFirstName', '$EC_Middle_Name', '$EC_Last_Name', '$EC_Country_Code', '$EC_Contact_Number','$Passenger_Count' ,'$password')";
//$sql = "INSERT INTO Registration VALUES (1,2, '34', '345',345, 'vdjvo', 'cdihv','jh@nyu.edu','+1',987764322, 'M', 'Indian','yash', 'lkh','jhgh','+1', 09877,9 ,'123')";

$sql = "INSERT INTO JBVR_Passenger (PTYPE ,PFNAME ,PMNAME ,PLNAME ,DOB ,PNATIONALITY ,PGENDER ,PASSPORTNO ,PPEXPDATE, CID) VALUES ( '$PTYPE', '$PFNAME', '$PMNAME', '$PLNAME', '$DOB', '$PNATIONALITY', '$PGENDER', '$PASSPORTNO', '$PPEXPDATE', '$CID')";


$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
 header("Location: http://localhost/Website/Booking_details");
 $_SESSION['PID']=mysqli_insert_id($con);
}


?>