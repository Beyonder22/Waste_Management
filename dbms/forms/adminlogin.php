<?php
include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['admin_mail'])) {
    header("Location: admindash.php");
}

if(isset($_POST['submit'])) {
    $admin_mail = $_POST['admin_mail'];
    $admin_pass = md5($_POST['admin_pass']); 
    echo $admin_pass;

    $sql = "SELECT * FROM admin WHERE admin_mail='$admin_mail' AND admin_pass='$admin_pass'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_mail'] = $row['admin_mail'];
        $_SESSION['admin_pass'] = $row['admin_pass'];
        header("Location: admindash.php");
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
    <link rel="stylesheet" href="admin.css">
    <title>ADMIN LOGIN</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
                <h1>Admin</h1>
                <div class="box">
                    <i class="fa fa-envelope"></i>
                    <input type="email" required name="admin_mail" placeholder="Enter Your Email" value="<?php echo $admin_mail; ?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="password" required name="admin_pass" placeholder="Enter Your Password" value="<?php echo $_POST['admin_pass'];?>">
                </div>
                    <button name="submit" class="btn">Sign In</button>
        </div>
    </form>
</body>
</html>