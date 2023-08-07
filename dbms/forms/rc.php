<?php

include 'config.php';

session_start();

error_reporting(0);

if (!isset($_SESSION['admin_mail'])) {
    header("Location: adminlogin.php");
}
if(isset ($_POST['submit'])){
    $complain_resolve_date = $_POST['complain_resolve_date'];
    $complain_status = $_POST['complain_status'];
    $complain_id = $_POST['complain_id'];
    $sql = "UPDATE complain set complain_resolve_date='$complain_resolve_date ',complain_status='$complain_status' where complain_id='$complain_id'";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $complain_id = "";
        $complain_resolve_date = "";
        $complain_status = "";
        header("Location:adcomplaints.php");
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
    <title>Resolve Complaints</title>
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
                    <h1>Resolve Complaint</h1>
                    <div class="box">
                        <label for="complain_id">Complain Id:</label>
                        <input type="text" name="complain_id" required placeholder="Enter complain id" value="<?php echo $complain_id;?>">
                    </div>
                    <div class="box">
                        <label for="comp_resolve_date">Resolve Date:</label>
                        <input type="date" name="complain_resolve_date" required placeholder="Enter resolve date" value="<?php echo $complain_resolve_date;?>">
                    </div>
                    <div class="box">
                        <label for="comp_status">Complain Status:</label>
                        <input type="text" name="complain_status" required placeholder="Enter complain status" value="<?php echo $complain_status;?>">
                    </div>
                    <button name="submit" class="btn">Add Status</button>
            </div>
        </form>
</div>
</body>
</html>