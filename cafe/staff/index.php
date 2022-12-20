<?php
session_start();
include("includes/db.php");

$c = $_SESSION['staff_user'];
    
    $get_c = "select * from staff where staff_user ='$c'";
    
    $run_c = mysqli_query($con, $get_c);
    
    $row_c = mysqli_fetch_array($run_c);
        
    $staff_user = $row_c['staff_user'];
    $staff_id = $row_c['staff_id'];
    $staff_name = $row_c['staff_name'];

if(!isset($_SESSION['staff_user']))
{
    echo "<script>window.open('staff_login.php','_self')</script>";    
}
else {

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Online Meal System (OMS)</title>
<style>

body{
    background-color: lightblue;
    padding: 50px;
    margin: 20px;
}

h1{
    text-align: center;
    font-family: Verdana;
}

p{
    text-align: center;
    font-family: Verdana;
}

/* Navbar container */
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 25px;
  color: white;
  text-align: center;
  padding: 15px 50px;
  text-decoration: none;
}

.box{
  width: 1225px;
  height: 410px;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 120px 30px;
  overflow: hidden;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 25px; 
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>

<header>
<body>
<div class="navbar">
  <a id="Home" href="index.php">Home</a>
  <?php echo"<a href='staff_food_menu.php?staff_id=$staff_id'>Food Menu</a>"?>
  <?php echo"<a href='staff_drink_menu.php?staff_id=$staff_id'>Beverage Menu</a>"?>
  <?php echo"<a href='staff_sort_order.php?staff_id=$staff_id'>Order Detail</a>"?>
  <?php echo"<a> </a>" ?>
  <?php echo"<a> </a>" ?>
  <?php echo"<a> </a>" ?>
  <a href="staff_logout.php">Logout</a>
</div>

<div class="box">
    <h1>WELCOME, </h1>
    <p><?php echo"$staff_name" ?></p>
</div>
</body>
</header>
</html>
<?php } ?>