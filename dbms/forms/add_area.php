<?php

include 'config.php';

session_start();

error_reporting(0);

if (!isset($_SESSION['admin_mail'])) {
    header("Location: adminlogin.php");
}
if(isset ($_POST['submit'])){
    $area_id = $_POST['area_id'];
    $area_name = $_POST['area_name'];

    $sql = "INSERT INTO area (area_id,area_name) VALUES ('$area_id','$area_name')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $area_id = "";
        $area_name = "";
        header("Location:area.php");
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
    <title>Add Area Details</title>
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
                    <h1>Add Area Details</h1>
                    <div class="box">
                        <label for="area_id">Area id:</label>
                        <input type="text" name="area_id" required placeholder="Enter area id" value="<?php echo $area_id;?>">
                    </div>
                    <div class="box">
                        <label for="area_name">Area name:</label>
                        <input type="text" name="area_name" required placeholder="Enter area name" value="<?php echo $area_name;?>">
                    </div>
                    <button name="submit" class="btn">Add Area</button>
            </div>
        </form>
</div>
</body>
</html>