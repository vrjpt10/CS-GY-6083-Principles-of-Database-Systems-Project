<?php
echo "started";
$con = mysqli_connect('localhost', 'root', '','test');


  if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 

$Customer_type= (int)$_POST['Customer_type'];
$street=$_POST['street'];
$city=$_POST['city'];
$zip_code=(int)$_POST['zip_code'];
$state=$_POST['state'];
$country=$_POST['country'];
$email=$_POST['email'];
$country_code=$_POST['country_code'];
$number=(int)$_POST['number'];
$gender=$_POST['gender'];
$nationality=$_POST['nationality'];
$ECFirstName=$_POST['ECFirstName'];
$EC_Middle_Name=$_POST['EC_Middle_Name'];
$EC_Last_Name=$_POST['EC_last_Name'];
$EC_Country_Code=$_POST['EC_Country_Code'];
$EC_Contact_Number=(int)$_POST['EC_Contact_Number'];
$Passenger_Count=(int)$_POST['Passenger_Count'];
$password=$_POST['password'];


$sql = "INSERT INTO Registration (fldCType, fldCstreet, fldCity, fldZip, fldState, fldCountry, fldEmail, fldCountryCode, fldNumber, fldGender, fldNationality, fldECFirstName, fldECMiddleName, fldECLastName, fldECCountryCode, fldECNumber, fldPassengerCount, fldPassword) VALUES ('$Customer_type', '$street', '$city','$zip_code', '$state', '$country', '$email','$country_code','$number', '$gender', '$nationality','$ECFirstName', '$EC_Middle_Name',  '$EC_Last_Name', '$EC_Country_Code', '$EC_Contact_Number','$Passenger_Count' ,'$password')";

if ($result = mysqli_query($con, "SELECT * FROM Registration")) {
    printf("Select returned %d rows.\n", mysqli_num_rows($result));

   
    mysqli_free_result($result);
}
$rs = mysqli_query($con, $sql);

print ($rs);

if($rs)
{
	echo "Customer Records Inserted";
  header("Location: http://localhost/Website/login_page");
  
}
?>