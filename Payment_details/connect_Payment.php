<?php
echo "started";
session_start();
$con = mysqli_connect('localhost', 'root', '','test');


  if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 

 $INVID = $_SESSION["INVID"];
 print($INVID);
$CARDTYPE = $_POST['CARDTYPE'];
//$PAYMENTAMT= $_POST['PAYMENTAMT'];
$CARDNUMBER=$_POST['CARDNUMBER'];
$NAMECARD=$_POST['NAMECARD'];
$EXPDATE=$_POST['EXPDATE'];

$CARDTYPE1=mysqli_real_escape_string($con,$CARDTYPE);
//$PAYMENTAMT1=mysqli_real_escape_string($con,$PAYMENTAMT);
$CARDNUMBER1=mysqli_real_escape_string($con,$CARDNUMBER);
$NAMECARD1=mysqli_real_escape_string($con,$NAMECARD);
$EXPDATE1=mysqli_real_escape_string($con,$EXPDATE);

htmlspecialchars($CARDTYPE1, ENT_QUOTES, 'UTF-8');
htmlspecialchars($NAMECARD1, ENT_QUOTES, 'UTF-8');


$sql = "INSERT INTO JBVR_Payment ( CARDTYPE  ,  CARDNUMBER ,  NAMECARD ,  EXPDATE , INVID ) VALUES ('$CARDTYPE1', '$CARDNUMBER1', '$NAMECARD1', '$EXPDATE1', '$INVID')";
if ($result = mysqli_query($con, "SELECT * FROM JBVR_Payment")) {
    printf("Select returned %d rows.\n", mysqli_num_rows($result));

    /* free result set */
    mysqli_free_result($result);
}
$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Contact Records Inserted";
  header("Location: http://localhost/Website/Invoice_details");

}


?>