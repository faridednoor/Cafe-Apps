<?php
session_start();
include("includes/db.php");

$c = $_SESSION['stud_user'];
    
    $get_c = "select * from student where stud_user ='$c'";
    
    $run_c = mysqli_query($con, $get_c);
    
    $row_c = mysqli_fetch_array($run_c);
        
    $stud_name = $row_c['stud_name'];
    $stud_matrix = $row_c['stud_matrix'];
    $stud_email = $row_c['stud_email'];
    $stud_depart = $row_c['stud_depart'];
    $stud_id = $row_c['stud_id'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<style>

body{
    background-color: orange;
    padding: 50px;
    margin: 20px;
}
	
.avatar {
  	vertical-align: middle;
  	width: 150px;
  	height: 150px;
  	border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

.box{
  width: 1000px;
  height: 700px;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 70px 30px;
}

/* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

</style>
</head>

<body>
<div class="sidebar">
  <a href="index.php">Home</a>
  <?php echo"<a href='list_menu.php?stud_id=$stud_id'>Menu</a>"?>
  <?php echo"<a href='menu.php?stud_id=$stud_id'>Make Order</a>"?>
  <?php echo"<a href='orders.php?stud_id=$stud_id'>My Order</a>"?>
  <a href="profile.php">Profile</a>
  <a href="logout.php">Logout</a>
</div>

<form class="box">
  <div class="container">

  	<img src="img/img_avatar.png" alt="Avatar" class="avatar">

    <h1>Personal Info</h1>
    <hr>

    <label><b>Name</b></label>
    <?php echo"$stud_name" ?>
    </br>

    <label><b>Matrix Number</b></label>
    <?php echo"$stud_matrix" ?>
    </br>

    <label><b>Email</b></label>
    <?php echo"$stud_email" ?>
    </br>

    <label><b>Faculty</b></label>
    <?php echo"$stud_depart" ?>
    <hr>

  </div>
</form>

</body>