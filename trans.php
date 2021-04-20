<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="database_bank";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
if (!$conn) {
    die(mysqli_connect_error());
}
extract($_POST);
$from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    $sql = "SELECT * from entry_detail where account=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from entry_detail where account=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);
if (($amount) < 0) {
        
         echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
        
    } else if ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
         } 
         else if ($amount == 0) {
          echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $sender = $sql1['account'];
        $receiver = $sql2['account'];

        $money = $amount;
        if ($sender == $receiver) {
            $money = 0;
        }
        $newbalance = $sql1['balance'] - $money;
        $sql = "UPDATE entry_detail set balance=$newbalance where account=$from";
        mysqli_query($conn, $sql);



        $newbalance = $sql2['balance'] + $money;
        $sql = "UPDATE entry_detail set balance=$newbalance where account=$to";
        mysqli_query($conn, $sql);


     $sql = "insert into transaction (Sender, Receiver, Amount) values ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);
        echo "<script type='text/javascript'>";
        echo "alert('Transaction Sucessful!!!')";
        echo "</script>";

        $newbalance = 0;
        $amount = 0;
    }

?>