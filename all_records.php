<!DOCTYPE html>
<html>
<head>
	<meta charset="URF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Customer Details</title>
  <style type="text/css">
  	h2{
  		text-align: center;
  		font-size: 50px;
  		color: yellow;
  		text-shadow: 2px 2px black;
  		padding-top: 0px;
  		text-decoration: underline;
  	}
  	.center{
  		margin-left: auto;
  		margin-right: auto;
  	}
  	table{
  		border: 2px solid yellow;
  	}
  	td{
  		color: yellow;
  		font-weight: bold;
  		font-size: 22px;
  		text-shadow: 2px 2px black;
  	}
  	body{
  		background-image: url('lcus.jpg');
  		background-size: auto;
  		background-repeat: no-repeat;
  	}
  	.logo {
  		display: flex;
    font-size:30px;
 	font-weight: bold;
 	color:orange;
 	text-shadow: 3px 4px black;
 }  
 .logo img{
	width: 70px;
	border:3px solid blue;
	border-radius: 50%;

}
 
 #trans {
	padding-left: 600px;
	color: orange;
	text-shadow: 2px 2px black;
	font-size: 35px;
}
#home {
	padding-left: 70px;
	color: orange;
	text-shadow: 2px 2px black;
	font-size: 35px;
}

#trans:hover{
	font-size: 37px;
	text-shadow: 1px 1px white;
  
}
#home:hover{
	font-size: 37px;
	text-shadow: 1px 1px white;
  
}
#log{
	padding-top: 50px;

}
</style>
</head>
<body>


<div class="logo">
			<img src="logo.png" alt="logo">
			<div id="log">TSF BANK</div>
			<div><a href="transact.html" id="trans">Transaction</a></div>
			<div><a href="index.html" id="home">Home</a></div>
			</div>
<h2> List of Customer</h2>
<table border="2" class="center" width="75%">
  <tr>
  <td>Account No</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Gender</td>
    <td>E-mail</td>
    <td>Mobile</td>
    <td>Balance</td>
  </tr>

<?php

include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from entry_detail"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>

  <td><?php echo $data['account']; ?></td>
    <td><?php echo $data['first_name']; ?></td>
    <td><?php echo $data['last_name']; ?></td>

    <td><?php echo $data['gender']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['mobile']; ?></td>
    <td><?php echo $data['balance']; ?></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($db); // Close connection ?>

</body>
</html>