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
$PAYMENTAMT= $_POST['PAYMENTAMT'];
$CARDNUMBER=$_POST['CARDNUMBER'];
$NAMECARD=$_POST['NAMECARD'];
$EXPDATE=$_POST['EXPDATE'];


$sql = "INSERT INTO JBVR_Payment ( CARDTYPE ,  PAYMENTAMT ,  CARDNUMBER ,  NAMECARD ,  EXPDATE , INVID ) VALUES ('$CARDTYPE', '$PAYMENTAMT', '$CARDNUMBER', '$NAMECARD', '$EXPDATE', '$INVID')";
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