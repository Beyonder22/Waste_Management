<?php

include 'config.php';

session_start();

error_reporting(0);

if (!isset($_SESSION['u_name'])) {
    header("Location: login.php");
}
if(isset ($_POST['submit'])){
    $complain_date = $_POST['complain_date'];
    $complain_message = $_POST['complain_message'];
    $sql = "INSERT INTO complain (complain_date,complain_message,user_id)
                VALUES ('$complain_date','$complain_message',".$_SESSION['user id'].")";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $complain_date = "";
        $complain_message = "";
        header("Location:complaints.php");
        } else{
                echo "<script>alert('Woops! Something went wrong')</script>";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="cr&rc.css">
    <title>Complaint Register</title>
</head>
<body>
<div class="wrapper">
         <input type="checkbox" id="btn" hidden>
         <label for="btn" class="menu-btn">
         <i class="fas fa-bars"></i>
         <i class="fas fa-times"></i>
         </label>
         <nav id="sidebar">
            <div class="title">
                MENU
            </div>
            <ul class="list-items">
               <li><a href="dash.php"><i class="fas fa-home"></i>Home</a></li>
               <li><a href="accdetails.php"><i class="fas fa-user"></i>Account Details</a></li>
               <li><a href="complaints.php"><i class="fas fa-address-book"></i>Complaints</a></li>
               <li><a href="vd.php"><i class="fas fa-truck"></i>Vehicle Driver</a></li>
               <li><a href="waste.php"><i class="fas fa-dumpster"></i>Waste Stats</a></li>
               <li><a href="contact.php"><i class="fas fa-envelope"></i>Contact Us</a></li>
               <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
               <div class="icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
               </div>
            </ul>
         </nav>
      </div>
      <form action="" method="POST">
        <div class="container">
                <h1>Register Complaint</h1>
                <div class="box">
                    <input type="date" required name="complain_date"  placeholder="Enter Complaint Date" value="<?php echo $complain_date;?>">
                </div>
                <div class="box">
                    <input type="text" required name="complain_message"  placeholder="Enter Your Complaint" value="<?php echo $complain_message;?>">
                </div>
                <button name="submit" class="btn">Submit</button>
        </div>
    </form>
</div>
</body>
</html>