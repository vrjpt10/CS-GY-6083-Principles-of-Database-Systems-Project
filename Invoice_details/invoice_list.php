<?php 
session_start();
include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>SAME</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('inc/container.php');?>
	<div class="container">		
	  <h2 class="title">Invoice</h2>
	  <?php include('menu.php');?>			  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Date Created</th>
            <th>Customer Email</th>
            <th>Invoice Amount</th>
            <th>Print</th>
          </tr>
        </thead>
        <?php		
		$invoiceList = $invoice->getInvoiceList();

        foreach($invoiceList as $invoiceDetails){
			$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["INVDATE"]));
            echo '
              <tr>
                <td>'.$invoiceDetails["INVID"].'</td>
                <td>'.$invoiceDate.'</td>
                <td>'.$_SESSION['email'].'</td>
                <td>'.$invoiceDetails["INVAMT"].'</td>
                <td><a href="print_invoice.php?invoice_id='.$invoiceDetails["INVID"].'" title="Print Invoice"><span class="glyphicon glyphicon-print"></span></a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>	
<?php include('inc/footer.php');?>