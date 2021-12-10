<?php
echo "started";
session_start();
$con = mysqli_connect('localhost', 'root', '','test');


  if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 
 $CID = $_SESSION['cid'];
$BID = $_SESSION['BOOKINGID'];
$INVDATE = $_POST['INVDATE'];
$INVAMT= (int)$_POST['INVAMT'];

$sql = "INSERT INTO JBVR_Invoice (INVDATE, INVAMT, CID, BOOKINGID) VALUES ('$INVDATE', '$INVAMT','$CID', '$BID')";

if ($result = mysqli_query($con, "SELECT * FROM JBVR_INVOICE")) {
    printf("Select returned %d rows.\n", mysqli_num_rows($result));

    
    mysqli_free_result($result);
}
$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Payment_details");
  $_SESSION['INVID']=mysqli_insert_id($con);
}

?>