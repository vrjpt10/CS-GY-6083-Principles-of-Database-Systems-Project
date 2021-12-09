<?php
$con = mysqli_connect('localhost', 'root', '','test');

$customer_ID = $_POST['customer_ID'];
$Customer_type= $_POST['Customer_type'];
$street=$_POST['street'];
$city=$_POST['city'];
$zip_code=$_POST['zip_code'];
$state=$_POST['state'];
$country=$_POST['country'];
$email=$_POST['email'];
$country_code=$_POST['country_code'];
$number=$_POST['number'];
$gender=$_POST['gender'];
$nationality=$_POST['nationality'];
$ECFirstName=$_POST['ECFirstName'];
$EC_Middle_Name=$_POST['$EC_Middle_Name'];
$EC_Last_Name=$_POST['$EC_Last_Name'];
$EC_Country_Code=$_POST['$EC_Country_Code'];
$EC_Contact_Number=$_POST['$EC_Contact_Number'];
$Passenger_Count=$_POST['Passenger_Count'];
$password=$_POST['password'];

$sql = "INSERT INTO 'Registration' ('fldCID', 'fldCType', 'fldCstreet, 'fldCity', 'fldZip', 'fldState', 'fldCountry', 'fldEmail', 'fldCountryCode', 'fldNumber', 'fldGender', 'fldNationality', 'fldECFirstName', 'fldECMiddleName', 'fldECLastName', 'fldECCountryCode', 'fldECNumber', 'fldPassengerCount', 'fldPassword') VALUES ($customer_ID,$Customer_type, $street, $city,$zip_code, $state, $country, $email,$country_code,$number, $gender, $nationality,$ECFirstName, $EC_Middle_Name,  $EC_Last_Name, $EC_Country_Code, $EC_Contact_Number,$Passenger_Count ,$password)";

$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}


?>