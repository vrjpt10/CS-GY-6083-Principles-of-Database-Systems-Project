<?php 
session_start();
include('inc/header.php');
$loginError = '';
if (1) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers('admin@phpzag.com', '12345'); 
	if(!empty($user)) {
		$_SESSION['email'] = $user[0]['fldEmail'];		
		header("Location:invoice_list.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}
?>
<?php include('inc/container.php');?>
<?php include('inc/footer.php');?>