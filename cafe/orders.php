<?php
session_start();
include("includes/db.php");

$c = $_SESSION['stud_user'];
  
  $get_c = "select * from student where stud_user ='$c'";
  
  $run_c = mysqli_query($con, $get_c);
  
  $row_c = mysqli_fetch_array($run_c);
    
  $stud_id = $row_c['stud_id'];

  echo "<script>alert ('Notice: Please bring enough money including on the total price given.')</script>";

?>

<!DOCTYPE html>
<html>
<head>
<title>My Orders</title>
<style>

  body{
    background-color: orange;
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

h1{
  text-align: center;
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
	<form>
		<div>
    <h1>Order Detail</h1>
    <h3 align="center">Note: Only the order before 10.30 am will be delivered.</h3>
    <table width="900" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
    <tr>
      <tr>
        <td colspan="10" align="right">
          <p align="right"><?php echo"<button><a href='menu.php?stud_id=$stud_id'>Make Another Order Now</a></button>"?>
          <?php echo"<button><a href='list_menu.php?stud_id=$stud_id'>See the Menu</a></button>"?></p>
        </td>
      </tr>
  
      <th>Order Time</th>
      <th>Food</th>
      <th>Food Price</th>
      <th>Food Quantity</th>
      <th>Drink</th>
      <th>Drink Price</th>
      <th>Drink Quantity</th>
      <th>Place to Delivered</th>
      <th>Total</th>
    
    </tr>
<?php
    include("includes/db.php");
    $stud_id = $_GET['stud_id'];
    
    $get_order = "select * from orders_details WHERE stud_id='$stud_id'  ORDER BY detail_id DESC";
    
    $run_order = mysqli_query($con, $get_order);
    
    while($row_order = mysqli_fetch_array($run_order)){
      
      $detail_id = $row_order['detail_id'];
      $food = $row_order['food'];
      $num_food = $row_order['num_food'];
      $drink = $row_order['drink'];
      $num_drink = $row_order['num_drink'];
      $deliver = $row_order['deliver'];
      $order_time = $row_order['order_time'];  

    $get_food = "select * from food WHERE food_id='$food'";
    $run_food = mysqli_query($con, $get_food);
    $row_food=mysqli_fetch_array($run_food);
    $food_name = $row_food['food_name'];
    $food_price = $row_food['food_price'];

    $food_total = $food_price*$num_food;

    $get_drink = "select * from drink WHERE drink_id='$drink'";
    $run_drink = mysqli_query($con, $get_drink);
    $row_drink = mysqli_fetch_array($run_drink);
    $drink_name = $row_drink['drink_name'];
    $drink_price = $row_drink['drink_price'];

    $drink_total = $drink_price*$num_drink;

    $total = $food_total + $drink_total;

    $get_deliver = "select * from place_deliver WHERE deliver_id='$deliver'";
    $run_deliver = mysqli_query($con, $get_deliver);
    $row_deliver = mysqli_fetch_array($run_deliver);
    $place = $row_deliver['place'];
    $time = $row_deliver['time'];


    $insert_total = "update orders_details set total='$total' where detail_id='$detail_id'";
    
    $run_total= mysqli_query($con,$insert_total);
    
    ?>

            <tr>
            <td><?php echo $order_time ?></td>
            <td><?php echo $food_name ?></td>
            <td>RM <?php echo $food_price ?></td>
            <td><?php echo $num_food ?></td>
            <td><?php echo $drink_name ?></td>
            <td><?php 
            if ($drink_price==0) {
                    echo "";    
                  }
                  else{ 
                    echo $drink_price ;
                  } ?></td>
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
            <?php } ?>
            
        

    </table>
    </div>
	</form>
</body>
</html>