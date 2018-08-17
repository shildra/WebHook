<?php

session_start();// Starting Session
$username = $_SESSION['username'];
$password = $_SESSION['password'];

include "my_connection.php";

$sql="select * from users where password='$password' AND username='$username'";
$result = mysqli_query($con,$sql);
$result = mysqli_num_rows($result);

if ($result == 0) {
    header("Location: logout.php");
    }
?>