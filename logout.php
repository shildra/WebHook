<<<<<<< HEAD
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo 'You have cleaned session';
header("Location: index.php"); /* Redirect browser */
=======
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);

echo 'You have cleaned session';
header("Location: index.php"); /* Redirect browser */
>>>>>>> ff099208e932b5ae689a46b4f4a23971b9b0ceb3
?>