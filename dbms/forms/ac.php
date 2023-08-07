
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ac.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>All Complaints</title>
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
      <div class="content">
         <div class="header">
         <table border='2'>
            <tr>
            <th>User Id</th>
            <th>Complain Id</th>
            <th>Complain Date</th>
            <th>Complain</th>
            <th>Resolve Date</th>
            <th>Status</th>
      <?php

      include 'config.php';

      error_reporting(0);

      session_start();



      if (!isset($_SESSION['admin_mail'])) {
         header("Location: adminlogin.php");
     }
      $query = "select * from complain ";
      $data = mysqli_query($conn,$query);
      $total = mysqli_num_rows($data);

      if($total!=0)
      {
         while(($result=mysqli_fetch_assoc($data)))
         {
            echo "
            <tr>
            <td>".$result['user_id']."</td>
            <td>".$result['complain_id']."</td>
            <td>".$result['complain_date']."</td>
            <td>".$result['complain_message']."</td>
            <td>".$result['complain_resolve_date']."</td>
            <td>".$result['complain_status']."</td>
            </tr>
            ";
         }
      }

?>
         </div>
      </div>
</div>
</body>
</html>