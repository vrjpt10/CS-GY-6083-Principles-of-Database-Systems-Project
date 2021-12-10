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





$sql = "INSERT INTO JBVR_InsurancePlans( INSURANCETYPE ,  IPNAME ,  IPSTARTDATE ,  IPENDDATE ,  IPCOST, PID) VALUES ('$INSURANCETYPE','$IPNAME', '$IPSTARTDATE', '$IPENDDATE' ,'$IPCOST', '$PID')";

$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Invoice");
  $_SESSION['PID']=mysqli_insert_id($con);
}

?>