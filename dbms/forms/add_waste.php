<?php

include 'config.php';

session_start();

error_reporting(0);

if (!isset($_SESSION['admin_mail'])) {
    header("Location: adminlogin.php");
}
if(isset ($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $w_date = $_POST['w_date'];
    $bio_weight = $_POST['bio_weight'];
    $non_bio_weight  = $_POST['non_bio_weight'];
    $total_waste_weight  = $_POST['total_waste_weight'];

    $sql = "INSERT INTO waste_collected (user_id,w_date,bio_weight,non_bio_weight,total_waste_weight) VALUES ('$user_id','$w_date','$bio_weight','$non_bio_weight','$total_waste_weight')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $user_id = "";
        $w_date = "";
        $bio_weight = "";
        $non_bio_weight  = "";
        $total_waste_weight  = "";
        header("Location:adwaste.php");
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
    <title>Add Waste Details</title>
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
               <li><a href="admindash.php"><i class="fas fa-home"></i>Home</a></li>
               <li><a href="userdet.php"><i class="fas fa-user"></i>Account Details</a></li>
               <li><a href="adcomplaints.php"><i class="fas fa-address-book"></i>Complaints</a></li>
               <li><a href="advd.php"><i class="fas fa-truck"></i>Vehicle Driver</a></li>
               <li><a href="area.php"><i class="fas fa-map-marked"></i></i>Area</a></li>
               <li><a href="adwaste.php"><i class="fas fa-dumpster"></i>Waste Stats</a></li>
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
                    <h1>Add Waste Details</h1>
                    <div class="box">
                        <label for="user_id">User Id:</label>
                        <input type="text" name="user_id" required placeholder="Enter user id" value="<?php echo $user_id;?>">
                    </div>
                    <div class="box">
                        <label for="w_date">Collection Date:</label>
                        <input type="date" name="w_date" required placeholder="Enter collection date" value="<?php echo $w_date;?>">
                    </div>
                    <div class="box">
                        <label for="bio_weight">Weigth of Biodegradable Waste:</label>
                        <input type="text" name="bio_weight" required placeholder="Enter bio waste" value="<?php echo $bio_weight;?>">
                    </div>
                    <div class="box">
                        <label for="non_bio_weigth">Weigth of Non-Biodegradable Waste:</label>
                        <input type="text" name="non_bio_weight" required placeholder="Enter non-bio waste" value="<?php echo $non_bio_weight;?>">
                    </div>
                    <div class="box">
                        <label for="total_waste_weight">Total Waste Weigth:</label>
                        <input type="text" name="total_waste_weight" required placeholder="Enter total waste weight" value="<?php echo $total_waste_weight;?>">
                    </div>
                    <button name="submit" class="btn">Add Waste</button>
            </div>
        </form>
</div>
</body>
</html>