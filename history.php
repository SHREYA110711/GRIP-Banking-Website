<!DOCTYPE html>
<html>
<head>
	<title>Transaction History</title>
	<style type="text/css">
		#logo{
			width: 70px;
			height: 70px;
			border:2px solid blue;
			border-radius: 50%;
		}
		div{
			color: orange;
			font-size: 30px;
			font-weight: bold;
			text-shadow: 1px 1px navy;
		}
		h1{
			text-align: center;
			text-decoration: underline;
			color:yellow;
			font-weight: bold;
		}
		table{
			margin-left: auto;
			margin-right: auto;
			color: white;
			font-size: 20px;
		}
		body{
			background-image: url('bag.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
		
	</style>
</head>
<body>
	<div>
		<img src="logo.png" id="logo">TSF BANK

	</div>
    
   <h1>Transaction History</h1>
   <table border="2" class="center" width="75%">
  <tr>
    <td>Sender Account Number</td>
    <td>Receiver Account Number</td>
    <td>Amount</td>
    </tr>
    <?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from transaction"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>

  <td><?php echo $data['Sender']; ?></td>
    <td><?php echo $data['Receiver']; ?></td>
    <td><?php echo $data['Amount']; ?></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($db); // Close connection ?>
</body>
</html>