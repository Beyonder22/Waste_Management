<?php

session_start();

if (!isset($_SESSION['u_name'])) {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Vehicle Driver</title>
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
      <div class="content">
         <div class="header">
         <table border='2'>
            <tr>
            <th>Vehicle No</th>
            <th>Driver Name</th>
            <th>Driver Contact</th>
            <th>Helper Name</th>
            </tr>
      <?php

         include 'config.php';

         error_reporting(0);

         session_start();

         $query = "select * from vehicle where area_id in(select area_id from user where user_id=".$_SESSION['user id'].")";
         $data = mysqli_query($conn,$query);
         $total = mysqli_num_rows($data);

         if($total!=0)
         {
            while(($result=mysqli_fetch_assoc($data)))
            {
               echo "
               <tr>
               <td>".$result['vehicle_id']."</td>
               <td>".$result['driver_name']."</td>
               <td>".$result['driver_contact']."</td>
               <td>".$result['helper_name']."</td>
               </tr>
               ";
            }
         }
      ?>
      </div>
   </div>
    
</body>
</html>