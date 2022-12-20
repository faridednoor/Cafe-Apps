<?php
session_start();
include("includes/db.php");

$c = $_SESSION['stud_user'];
  
  $get_c = "select * from student where stud_user ='$c'";
  
  $run_c = mysqli_query($con, $get_c);
  
  $row_c = mysqli_fetch_array($run_c);
    
  $stud_id = $row_c['stud_id'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Menu</title>
<style>

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

h1{
  text-align: center;
}

body{
    background-color: orange;
    
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
  <?php echo"<a href='list_menu.php?stud_id=$stud_id'>Menu</a>"?>
  <?php echo"<a href='menu.php?stud_id=$stud_id'>Make Order</a>"?>
  <?php echo"<a href='orders.php?stud_id=$stud_id'>My Order</a>"?>
</div>
  <form enctype="multipart/form-data">
    <div>
    <h1>Menu Details</h1>
    <br>
    <h1>Food Menu</h1>
    <table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
    <tr>
  
      <th>Image</th>
      <th>Food</th>
      <th>Food Price</th>
    
    </tr>
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
    <td><img src='staff/images/$food_image' width='150px' height='80px'></td>
    <td> $food_name </td>
    <td>RM $food_price</td>
</tr>
   ";
  }

  echo "</table>";

?>
    </table>
    </div>
    <br>
    <br>

    <div>
      <h1>Beverage Menu</h1>
    <table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
    <tr>
  
      <th>Image</th>
      <th>Drink</th>
      <th>Drink Price</th>
    
    </tr>
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
    <td><img src='staff/images/$drink_image' width='150px' height='80px'></td>
    <td> $drink_name </td>
    <td>RM $drink_price</td>
</tr>
   ";
  }

  echo "</table>";

?>
    </table>
    </div>
  </form>
  <br>
  <p align="center"><?php echo"<button><a href='menu.php?stud_id=$stud_id'>Make Your Order Now</a></button>"?></p>
</body>
</html>