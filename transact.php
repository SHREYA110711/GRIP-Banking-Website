<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> Transaction </h1>
<form>
	<div>
	<input type="number" name="from" placeholder="Sender's Account Number">
</div>
<div>
	<input type="number" name="to" placeholder="Receiver's Account Number">
</div>
<div>
	<input type="number" name="amount" placeholder="Amount">
</div>
<button>transfer</button>
</form>

<?php

include "dbConn.php";
if (!$conn) {
    die(mysqli_connect_error());
}
extract($_POST);
$from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    $sql = "SELECT * from users where account=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where account=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);
f (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    } else if ($amount > $sql1['balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
    } else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $sender = $sql1['name'];
        $receiver = $sql2['name'];

        $money = $amount;
        if ($sender == $receiver) {
            $money = 0;
        }
        $newbalance = $sql1['balance'] - $money;
        $sql = "UPDATE users set balance=$newbalance where account=$from";
        mysqli_query($conn, $sql);



        $newbalance = $sql2['balance'] + $money;
        $sql = "UPDATE users set balance=$newbalance where account=$to";
        mysqli_query($conn, $sql);


     $sql = "insert into transaction (Sender, Receiver, Amount) values ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);
        echo "<script type='text/javascript'>";
        echo "alert('Transaction Sucessful!!!')";
        echo "</script>";

        $newbalance = 0;
        $amount = 0;
    }
}
?>


</body>
</html>









