<?php
session_start();
include("includes/db.php");

$c = $_SESSION['staff_user'];
  
  $get_c = "select * from staff where staff_user ='$c'";
  
  $run_c = mysqli_query($con, $get_c);
  
  $row_c = mysqli_fetch_array($run_c);
    
  $staff_id = $row_c['staff_id'];


?>

<!DOCTYPE html>
<html>
<head>
<title>Menu Detail</title>
<style>
body{
  background-color: lightblue;
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
  <?php echo"<a href='staff_food_menu.php?staff_id=$staff_id'>Food Menu</a>"?>
  <?php echo"<a href='staff_drink_menu.php?staff_id=$staff_id'>Beverage Menu</a>"?>
  <?php echo"<a href='staff_sort_order.php?staff_id=$staff_id'>Order Detail</a>"?>
</div>
<div>
<h1>Menu Detail</h1>
<form>  
  <table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
  <tr>
    <tr>     
          <td colspan="9" align="right">
          <button><a href="staff_add_drink.php">Add New Drink</a></button></td>
      </tr>
      <th>Image</th>
    <th>Drink Name</th>
    <th>Price</th>
    <th>Update Image</th>
      <th>Update Food Name and Price</th>
      <th>Delete Menu</th>
  </tr>
  </tr>
</form>
</div>

<?php

$sel_drink = "select * from drink";
$view_drink = mysqli_query($con, $sel_drink);

  while ($row = mysqli_fetch_array($view_drink)) {


$drink_id = $row['drink_id'];
$drink_name = $row['drink_name'];
$drink_price = $row['drink_price'];
$drink_image = $row['drink_image'];

    echo "
<tr>
    <td><img src='images/$drink_image' width='150px' height='80px'></td>
    <td> $drink_name </td>
    <td>RM $drink_price</td>
    <td><a href='update_drink_image.php?drink_id=$drink_id'>Update</a></td>
    <td><a href='staff_update_drink.php?drink_id=$drink_id'>Update</a></td>
    <td><a href='staff_delete_drink.php?drink_id=$drink_id'>Delete</a></td>
</tr>
   ";
  }

  echo "</table>";


?>
</table>
</body>
</html>

