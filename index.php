<?php
ob_start();
session_start();

$app->get('/cowsay', function() use($app) {
  $app['monolog']->addDebug('cowsay');
  return "<pre>".\Cowsayphp\Cow::say("Cool beans")."</pre>";
});

?>

<html lang = "en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
        }

        h2{
            text-align: center;
            color: #017572;
        }
    </style>

</head>

<body>

<h2>Enter Username and Password</h2>
<div class = "container form-signin">

    <?php
    
    ?>

    <?php
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username'])
        && !empty($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        include "my_connection.php";
        $sql="select * from users where password='$password' AND username='$username'";
        $result = mysqli_query($con,$sql);
        $result = mysqli_num_rows($result);

        if ($result>0) {
            $_SESSION['valid'] = true;
            $_SESSION['password'] = $password;
            $_SESSION['username'] = $username;

            header("Location: display.php"); /* Redirect browser */
            exit();
        }else {
            $msg = 'Wrong username or password';
        }
    }
    ?>
</div> <!-- /container -->

<div class = "container">

    <form class = "form-signin" role = "form"
          action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
          ?>" method = "post">
        <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
        <input type = "text" class = "form-control"
               name = "username" required autofocus></br>
        <input type = "password" class = "form-control"
               name = "password" required>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit"
                name = "login">Login</button>
    </form>

    Click here to <a href = "logout.php" tite = "Logout">LogOut</a>

</div>

</body>
</html>