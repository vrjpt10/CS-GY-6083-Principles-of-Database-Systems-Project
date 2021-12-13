<?php
session_start();
echo "started";
$con = mysqli_connect('localhost', 'root', '','test');


 if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 
$BOOKINGID = $_SESSION["BOOKINGID"];

$PTYPE= $_POST['PTYPE'];
$PFNAME=$_POST['PFNAME'];
$PMNAME=$_POST['PMNAME'];
$PLNAME=$_POST['PLNAME'];
$DOB=$_POST['DOB'];
$PNATIONALITY=$_POST['PNATIONALITY'];
$PGENDER=$_POST['PGENDER'];
$PASSPORTNO=$_POST['PASSPORTNO'];
$PPEXPDATE=$_POST['PPEXPDATE'];
$MEALPLAN=$_POST['mealplan'];
$CABINCLASS=$_POST['cabinclass'];
$SPECIALREQUEST=$_POST['spclreq'];
$INSTYPE=$_POST['instype'];

$PTYPE1=mysqli_real_escape_string($con,$PTYPE);
$PFNAME1=mysqli_real_escape_string($con,$PFNAME);
$PMNAME1=mysqli_real_escape_string($con,$PMNAME);
$PLNAME1=mysqli_real_escape_string($con,$PLNAME);
$DOB1=mysqli_real_escape_string($con,$DOB);
$PNATIONALITY1=mysqli_real_escape_string($con,$PNATIONALITY);
$PGENDER1=mysqli_real_escape_string($con,$PGENDER);
$PASSPORTNO1=mysqli_real_escape_string($con,$PASSPORTNO);
$PPEXPDATE1=mysqli_real_escape_string($con,$PPEXPDATE);
$MEALPLAN1=mysqli_real_escape_string($con,$MEALPLAN);
$CABINCLASS1=mysqli_real_escape_string($con,$CABINCLASS);
$SPECIALREQUEST1=mysqli_real_escape_string($con,$SPECIALREQUEST);
// $INSTYPE1=mysqli_real_escape_string($con,$INSTYPE);

htmlspecialchars($PTYPE1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($PFNAME1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($PMNAME1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($PLNAME1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($PNATIONALITY1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($PGENDER1, ENT_QUOTES, 'UTF-8');
// htmlspecialchars($INSURANCETYPE1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($PASSPORTNO1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($MEALPLAN1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($CABINCLASS1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($SPECIALREQUEST1, ENT_QUOTES, 'UTF-8');


//$sql = "INSERT INTO JBVR_PASSENGER VALUES ('$customer_ID','$Customer_type', '$street', '$city','$zip_code', '$state', '$country', '$email','$country_code','$number', '$gender', '$nationality','$ECFirstName', '$EC_Middle_Name', '$EC_Last_Name', '$EC_Country_Code', '$EC_Contact_Number','$Passenger_Count' ,'$password')";
//$sql = "INSERT INTO Registration VALUES (1,2, '34', '345',345, 'vdjvo', 'cdihv','jh@nyu.edu','+1',987764322, 'M', 'Indian','yash', 'lkh','jhgh','+1', 09877,9 ,'123')";

$sql = "INSERT INTO JBVR_Passenger (PTYPE ,PFNAME ,PMNAME ,PLNAME ,DOB ,PNATIONALITY ,PGENDER ,PASSPORTNO ,PPEXPDATE, MEALPLAN, SPECIALREQ, CABINCLASS, INSID, BOOKINGID) VALUES ( '$PTYPE1', '$PFNAME1', '$PMNAME1', '$PLNAME1', '$DOB1', '$PNATIONALITY1', '$PGENDER1', '$PASSPORTNO1', '$PPEXPDATE1', '$MEALPLAN1', '$CABINCLASS1', '$SPECIALREQUEST1', '$INSTYPE', '$BOOKINGID')";


$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
    header("Location: http://localhost/Website/Add_passenger");
 $_SESSION['PID']=mysqli_insert_id($con);
}


?>