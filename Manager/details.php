<?php
$con = mysqli_connect('localhost', 'root', '','test');
$query="select * from Registration"; 
$result=mysqli_query($con,$query); 
?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>Customer Record</h2></th> 
		</tr> 
			  <th> ID </th> 
			  <th> Type </th> 
			  <th> Number </th> 
			  <th> Email </th> 
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['fldCID']; ?></td> 
		<td><?php echo $rows['fldCType']; ?></td> 
		<td><?php echo $rows['fldNumber']; ?></td> 
		<td><?php echo $rows['fldEmail']; ?></td> 
		</tr> 
        <?php 
               }
        ?> 

	</table> 
	</body> 
	</html>

