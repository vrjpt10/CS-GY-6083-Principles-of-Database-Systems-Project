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
$date = date('Y-m-d H:i:s');
$sql_query="select sum(ins.ipcost) AS INVAMT
from JBVR_InsurancePlans ins join JBVR_Passenger pas on ins.InsID=pas.INSID join JBVR_BookingDetails book on pas.BOOKINGID=book.BOOKINGID
where book.BOOKINGID='".$BID."'";
if($result = mysqli_query($con, $sql_query)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      $sql = "INSERT INTO JBVR_Invoice (INVDATE, INVAMT, CID, BOOKINGID) VALUES ('$date', '".$row['INVAMT']."','$CID', '$BID')";
      $_SESSION['INVAMT']=$row['INVAMT'];
  
$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Payment_details");
  $_SESSION['INVID']=mysqli_insert_id($con);
  
}

    }
  }
}

?>