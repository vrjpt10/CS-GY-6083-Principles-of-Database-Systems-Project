<?php
session_start();
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_GET['invoice_id']) && $_GET['invoice_id']) {
	echo $_GET['invoice_id'];
	$invoiceValues = $invoice->getInvoice($_GET['invoice_id']);		
	$invoiceItems = $invoice->getInvoiceItems($_GET['invoice_id']);	
		
}
$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues['INVDATE']));
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	To,<br />
	<b>RECEIVER (BILL TO)</b><br />
	Email : '.$_SESSION['email'].'<br /> 
	</td>
	<td width="35%">         
	Invoice No. : '.$invoiceValues['INVID'].'<br />
	Invoice Date : '.$invoiceDate.'<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Insurance Type</th>
	<th align="left">Passenger Name</th>
	<th align="left">Insurance Plan Name</th>
	<th align="left">Cost</th>
	</tr>';
$count = 0;   
foreach($invoiceItems as $invoiceItem){
	$count++;
	$output .= '
	<tr>
	<td align="left">'.$count.'</td>
	<td align="left">'.$invoiceItem['INSURANCETYPE'].'</td>
	<td align="left">'.$invoiceItem['PFNAME'].'</td>
	<td align="left">'.$invoiceItem['IPNAME'].'</td>
	<td align="left">'.$invoiceItem['IPCOST'].'</td> 
	</tr>';
}
$output .= '
	<tr>
	<td align="right" colspan="5"><b>Amount:</b></td>
	<td align="left">'.$invoiceValues['INVAMT'].'</td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
$invoiceFileName = 'Invoice-'.$invoiceValues['INVID'].'.pdf';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>   
   