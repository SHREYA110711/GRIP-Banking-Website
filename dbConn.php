<?php

$db = mysqli_connect("localhost","root","","database_bank");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>