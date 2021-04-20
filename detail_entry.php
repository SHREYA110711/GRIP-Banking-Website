<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="database_bank";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("!!!!!!!!!!!!!Connection Failed !!!!!!!!!!!!!!!" . mysqli_connect_error());

}

if(isset($_POST['save']))
{
$account = $_POST['account'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender =  $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$balance= $_POST['balance'];

$sql_query = "INSERT INTO entry_detail(account,first_name,last_name,gender,email,mobile,balance)
VALUES('$account','$first_name','$last_name','$gender','$email','$phone',$balance)";


if(mysqli_query($conn, $sql_query))
{
     echo "<script type='text/javascript'>";
        echo "alert('Transaction Sucessful!!!')";
        echo "</script>";

}
else
{

echo "ERROR: " .$sql. "" .mysqli_error($conn);  
}
mysqli_close($conn);
}
?>