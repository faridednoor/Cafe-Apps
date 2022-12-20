<?php
session_start();
include("includes/db.php");

$c = $_SESSION['admin_user'];
    
    $get_c = "select * from admin where admin_user ='$c'";
    
    $run_c = mysqli_query($con, $get_c);
    
    $row_c = mysqli_fetch_array($run_c);
        
    $admin_user = $row_c['admin_user'];
    $admin_id = $row_c['admin_id'];
    $admin_name = $row_c['admin_name'];

if(!isset($_SESSION['admin_user']))
{
    
    echo "<script>window.open('admin_login.php','_self')</script>";
    
    }
    
    else {
        
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Order Your Food</title>
<style>

body{
    background-color: lightgreen;
}

h1{
    margin-top: 100px;
    margin-left: 150px;
    text-align: center;
    font-family: Verdana;
}

p{
    margin-left: 150px;
    text-align: center;
    font-family: Verdana;
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

<header>
<body>

<div class="sidebar">
  <a href="index.php">Home</a>
  <?php echo"<a href='staff.php?admin_id=$admin_id'>Staff</a>"?>
  <?php echo"<a href='student.php?admin_id=$admin_id'>Student</a>"?>
  <!-- <?php echo"<a href='food_menu.php?admin_id=$admin_id'>Food Menu</a>"?>
  <?php echo"<a href='drink_menu.php?admin_id=$admin_id'>Beverage Menu</a>"?>
  <?php echo"<a href='orders.php?admin_id=$admin_id'>Order Detail</a>"?> -->
  <a href="admin_logout.php">Logout</a>
</div>
<div>
    <h1>WELCOME, </h1>
    <p><?php echo"$admin_name"?></p>
</div>

</body>
</header>
</html>
<?php } ?>