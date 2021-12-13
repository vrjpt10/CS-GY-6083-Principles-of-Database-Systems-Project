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

$password=$_POST['password'];


$street=mysqli_real_escape_string($con,$street);
$city=mysqli_real_escape_string($con,$city);
$state=mysqli_real_escape_string($con,$state);
$country=mysqli_real_escape_string($con,$country);
$email=mysqli_real_escape_string($con,$email);
$gender=mysqli_real_escape_string($con,$gender);
$nationality=mysqli_real_escape_string($con,$nationality);
$ECFirstName=mysqli_real_escape_string($con,$ECFirstName);
$EC_Middle_Name=mysqli_real_escape_string($con,$EC_Middle_Name);
$EC_Last_Name=mysqli_real_escape_string($con,$EC_Last_Name);
//$password=mysqli_real_escape_string($con,$password);

htmlspecialchars($street, ENT_QUOTES, 'UTF-8');
htmlspecialchars($city, ENT_QUOTES, 'UTF-8');
htmlspecialchars($state, ENT_QUOTES, 'UTF-8');
htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
htmlspecialchars($gender, ENT_QUOTES, 'UTF-8');
htmlspecialchars($nationality, ENT_QUOTES, 'UTF-8');
htmlspecialchars($ECFirstName, ENT_QUOTES, 'UTF-8');
htmlspecialchars($EC_Middle_Name, ENT_QUOTES, 'UTF-8');
htmlspecialchars($EC_Last_Name, ENT_QUOTES, 'UTF-8');
//htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

//$hash = password_hash($password, PASSWORD_DEFAULT);
print($Customer_type);
print($street);
print($city );
print($zip_code );
print($state );
print($country );
print($email );
print($country_code );
print($number) ;
print($nationality );
print($ECFirstName );
print($EC_Middle_Name );
print($EC_Last_Name );
print($EC_Country_Code );
print($EC_Contact_Number );



//print ($hash);
$sql = "INSERT INTO Registration (fldCType, fldCstreet, fldCity, fldZip, fldState, fldCountry, fldEmail, fldCountryCode, fldNumber, fldGender, fldNationality, fldECFirstName, fldECMiddleName, fldECLastName, fldECCountryCode, fldECNumber,  fldPassword) VALUES ('$Customer_type', '$street', '$city','$zip_code', '$state', '$country', '$email','$country_code','$number', '$gender', '$nationality','$ECFirstName', '$EC_Middle_Name',  '$EC_Last_Name', '$EC_Country_Code', '$EC_Contact_Number' ,'$hash')";

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