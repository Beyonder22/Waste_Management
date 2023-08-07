<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['u_name'])) {
    header("Location: login.php");
}

if(isset ($_POST['submit'])){
    $u_name = $_POST['u_name'];
    $email_id = $_POST['email_id'];
    $u_mobile = $_POST['u_mobile'];
    $occupation = $_POST['occupation'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $area_id = $_POST['area_id'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword) {
        $sql = "SELECT * FROM user WHERE email_id='$email_id'";
        $result = mysqli_query($conn, $sql);
        if(!$result->num_rows > 0){
            $sql = "INSERT INTO user (u_name,email_id,u_mobile,occupation,age,gender,password,address,area_id)
                VALUES ('$u_name','$email_id','$u_mobile','$occupation','$age','$gender','$password','$address','$area_id')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('User Registered Successfully')</script>";
                $u_name = "";
                $email_id = "";
                $u_mobile = "";
                $occupation = "";
                $age = "";
                $gender = "";
                $address = "";
                $area_id = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else{
                    echo "<script>alert('Woops! Something went wrong')</script>";
                }
            }else{
                echo "<script>alert('You Are Already Registered!')</script>";
            }    
    } else {
        echo "<script>alert('Password Not Matched')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Register User</title>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
                <h1>Sign Up</h1>
                <div class="box">
                    <i class="fa fa-envelope"></i>
                    <input type="text" required name="u_name"  placeholder="Enter Your Name" value="<?php echo $u_name;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="email" required name="email_id" placeholder="Enter Your Email" value="<?php echo $email_id;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="tel" required name="u_mobile"  placeholder="Enter Your Mobile Number" value="<?php echo $u_mobile;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="text" required name="occupation" placeholder="Enter Your Occupation" value="<?php echo $occupation;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="number" required name="age" placeholder="Enter Your Age" value="<?php echo $age;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="text" required name="gender" placeholder="Enter Your Gender" value="<?php echo $gender;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="text" required name="address" placeholder="Enter Your Address" value="<?php echo $address;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="text" required name="area_id" placeholder="Enter Your Area Id" value="<?php echo $area_id;?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="password" required name="password" placeholder="Enter Your Password" value="<?php echo $_POST['password'];?>">
                </div>
                <div class="box">
                    <i class="fa fa-key"></i>
                    <input type="password" required name="cpassword" placeholder="Confirm Your Password" value="<?php echo $_POST['cpassword'];?>">
                </div>
                <button name="submit" class="btn">Sign Up</button>
        </div>
    </form>
</body>
</html>