<<<<<<< HEAD
<?php
define('HOSTNAME','h2613153.stratoserver.net');
define('DB_USERNAME','dbo00091585');
define('DB_PASSWORD','!!defscript18!!');
define('DB_NAME', 'db00091585');

//global $con;
$con = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("error");
//$con = mysqli_connect("localhost", "root", "dhgidsus", "test") or die ("error");
// Check connection

if(mysqli_connect_errno($con))	echo "Failed to connect MySQL: " .mysqli_connect_error();
=======
<?php
define('HOSTNAME','h2613153.stratoserver.net');
define('DB_USERNAME','dbo00091585');
define('DB_PASSWORD','!!defscript18!!');
define('DB_NAME', 'db00091585');

//global $con;
$con = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("error");
//$con = mysqli_connect("localhost", "root", "dhgidsus", "test") or die ("error");
// Check connection

if(mysqli_connect_errno($con))	echo "Failed to connect MySQL: " .mysqli_connect_error();
>>>>>>> ff099208e932b5ae689a46b4f4a23971b9b0ceb3
?>