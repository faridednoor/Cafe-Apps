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
<title>Orders Details</title>
<style>

h1{
  text-align: center;
}

body{
    background-color: lightblue;
    padding: 50px;
    margin: 20px;
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
  <?php echo"<a href='staff_food_menu.php?staff_id=$staff_id'>Food Menu</a>"?>
  <?php echo"<a href='staff_drink_menu.php?staff_id=$staff_id'>Beverage Menu</a>"?>
  <?php echo"<a href='staff_sort_order.php?staff_id=$staff_id'>Order Detail</a>"?>
</div>
	<form method="post">
	<div>
    <h1>OMS</h1>
    <table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
    <tr>
  
      <td>Sort by</td>
      <td><select name="deliver">
        <option value=""></option>
          
            <?php 

            $get_place = "select * from place_deliver ";

            $run_place = mysqli_query ($con,$get_place);

            while ($row_place = mysqli_fetch_array($run_place)){


              $deliver_id = $row_place ['deliver_id'];
              $place = $row_place ['place'];

            echo "<option value='$deliver_id'>$place</option>" ;
            }

            ?>
          </select></td>
          <tr><td colspan="2" align="center"><button type="submit" name="select">Select</button>
          </td></tr>
  </tr>
</table>

<h1>Order Details</h1>

   <table width='800' border='2' align='center' cellpadding='2' cellspacing='2' bgcolor='white'>
    <tr>
  
      <th>Customer Name</th>
      <th>Order Time</th>
      <th>Food</th>
      <th>Food Quantity</th>
      <th>Drink</th>
      <th>Drink Quantity</th>
      <th>Place to Delivered</th>
      <th>Total</th>
    
    </tr>



<?php

if(isset($_POST['select'])){

$deliver = $_POST ['deliver'];

$sel_del = "select * from orders_details where deliver='$deliver' order by order_time DESC";
$view_del = mysqli_query($con, $sel_del);


while ($row = mysqli_fetch_array($view_del)) {
$stud_id = $row['stud_id'];
$order_time = $row['order_time'];
$food = $row['food'];
$num_food = $row['num_food'];
$drink = $row['drink'];
$num_drink = $row['num_drink'];
$deliver = $row['deliver'];
$total = $row['total'];

$get_stud_id = "select * from student where stud_id ='$stud_id'";
$run_stud_id = mysqli_query($con, $get_stud_id);
$row_id = mysqli_fetch_array($run_stud_id);
$stud_name = $row_id['stud_name'];

$get_food = "select * from food WHERE food_id='$food'";
$run_food = mysqli_query($con, $get_food);
$row_food=mysqli_fetch_array($run_food);
$food_name = $row_food['food_name'];

$get_drink = "select * from drink WHERE drink_id='$drink'";
$run_drink = mysqli_query($con, $get_drink);
$row_drink = mysqli_fetch_array($run_drink);
$drink_name = $row_drink['drink_name'];

$get_deliver = "select * from place_deliver WHERE deliver_id='$deliver'";
$run_deliver = mysqli_query($con, $get_deliver);
$row_deliver = mysqli_fetch_array($run_deliver);
$place = $row_deliver['place'];
$time = $row_deliver['time'];
      
?>
    <tr>
      <td><?php echo $stud_name ?></td>
      <td><?php echo $order_time ?></td>
      <td><?php echo $food_name ?></td>
      <td><?php echo $num_food ?></td>
      <td><?php echo $drink_name ?></td>
      <td><?php 
        if ($num_drink==0) {
          echo "";    
        }
        else{ 
          echo $num_drink ;
        } ?></td>
      <td><?php echo $place ?> <?php echo $time ?></td>
      <td>RM <?php echo $total ?></td>

</tr>
<?php } } ?>
  </table>
 </div>
  </form>
</body>
</html>