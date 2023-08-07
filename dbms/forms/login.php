<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['u_name'])) {
    header("Location: dash.php");
}

if(isset($_POST['submit'])) {
    $email_id = $_POST['email_id'];
    $password = md5($_POST['password']); 
    echo $password;

    $sql = "SELECT * FROM user WHERE email_id='$email_id' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['u_name'] = $row['u_name'];
        $_SESSION['user id'] = $row['user_id'];
        header("Location: dash.php");
    }else {
        echo "<script>alert('Oops! Email Or Password Is Wrong')</script>";
    }
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>LOGIN</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
                <h1>User Log In</h1>
                <div class="box">
                    <i class="fa fa-envelope"></i>
                    <input type="email" required name="email_id" placeholder="Enter Your Email" value="<?php echo $email_id; ?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="password" required name="password" placeholder="Enter Your Password" value="<?php echo $_POST['password'];?>">
                </div>
                    <button name="submit" class="btn">Sign In</button>
                    <a href="register.php" target="_blank" class="btn">Sign Up</a>
        </div>
    </form>
</body>
</html>