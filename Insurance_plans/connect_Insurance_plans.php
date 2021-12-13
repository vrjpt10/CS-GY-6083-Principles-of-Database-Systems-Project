<?php
echo "started";
session_start();
$con = mysqli_connect('localhost', 'root', '','test');


  if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 
$PID = $_SESSION["PID"];
print($PID);
$INSURANCETYPE = (int)$_POST['INSURANCETYPE'];
$IPNAME= $_POST['IPNAME'];
$IPSTARTDATE=$_POST['IPSTARTDATE'];
$IPENDDATE=$_POST['IPENDDATE'];
$IPCOST=$_POST['IPCOST'];

$INSURANCETYPE1=mysqli_real_escape_string($con,$INSURANCETYPE);
$IPNAME1=mysqli_real_escape_string($con, $IPNAME);
$IPSTARTDATE1=mysqli_real_escape_string($con,$IPSTARTDATE);
$IPENDDATE1=mysqli_real_escape_string($con,$IPENDDATE);
$IPCOST1=mysqli_real_escape_string($con,$IPCOST);

// htmlspecialchars($INSURANCETYPE1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($IPNAME1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($IPCOST1, ENT_QUOTES, 'UTF-8');

$sql = "INSERT INTO JBVR_InsurancePlans( INSURANCETYPE ,  IPNAME ,  IPSTARTDATE ,  IPENDDATE ,  IPCOST, PID) VALUES ('$INSURANCETYPE1','$IPNAME1', '$IPSTARTDATE1', '$IPENDDATE1' ,'$IPCOST1', '$PID1')";

$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Invoice");
  $_SESSION['PID']=mysqli_insert_id($con);
}

?>