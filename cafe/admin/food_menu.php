<?php
session_start();
include("includes/db.php");

$c = $_SESSION['admin_user'];
  
  $get_c = "select * from admin where admin_user ='$c'";
  
  $run_c = mysqli_query($con, $get_c);
  
  $row_c = mysqli_fetch_array($run_c);
    
  $admin_id = $row_c['admin_id'];


?>

<!DOCTYPE html>
<html>
<head>
<title>Menu Detail</title>
<style>
body{
  background-color: lightgreen;
  margin: 50px;
}

h1{
  text-align: center;
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

a{
  text-decoration: none;
  color: black;
}

</style>
</head>

<body>
  <div class="sidebar">
  <a href="index.php">Home</a>
  <?php echo"<a href='staff.php?admin_id=$admin_id'>Staff</a>"?>
  <?php echo"<a href='student.php?admin_id=$admin_id'>Student</a>"?>
  <?php echo"<a href='food_menu.php?admin_id=$admin_id'>Food Menu</a>"?>
  <?php echo"<a href='drink_menu.php?admin_id=$admin_id'>Beverage Menu</a>"?>
  <?php echo"<a href='orders.php?admin_id=$admin_id'>Order Detail</a>"?>
</div>
<div>
<h1>Menu Detail</h1>
<form enctype="multipart/form-data">  
  <table width="900" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
  <tr>
    <tr>     
          <td colspan="7" align="right">
          <button><a href="add_food.php">Add New Food</a></button></td>
    </tr>
      <th>Image</th>
      <th>Food Name</th>
      <th>Price</th>
      <th>Update Image</th>
      <th>Update Food Name and Price</th>
      <th>Delete Menu</th>
  </tr>
</form>
</div>

<?php

$sel_food = "select * from food";
$view_food = mysqli_query($con, $sel_food);

while ($row = mysqli_fetch_array($view_food)) {


$food_id = $row['food_id'];
$food_name = $row['food_name'];
$food_price = $row['food_price'];
$food_image = $row['food_image'];

    echo "
<tr>
    <td>
    <img src='../staff/images/$food_image' width='150px' height='80px' align='center'>
    </td>
    <td> $food_name </td>
    <td>RM $food_price</td>
    <td><a href='update_food_image.php?food_id=$food_id'>Update</a></td>
    <td><a href='update_food.php?food_id=$food_id'>Update</a></td>
    <td><a href='delete_food.php?food_id=$food_id'>Delete</a></td>
</tr>
   ";
  }

  echo "</table>";


?>
</tr>
</table>
</body>
</html>

