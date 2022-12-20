<?php
session_start();
include("includes/db.php");

$c = $_SESSION['stud_user'];

  $get_c = "select * from student where stud_user = '$c'";

  $run_c = mysqli_query($con, $get_c);

  $row_c = mysqli_fetch_array($run_c);

  $stud_id = $row_c['stud_id'];

  echo "<script>alert ('Notice: The order open from 9.00 am until 10.30 am only. If you make order after 10.30 am, it will not be take.')</script>";

?>

<!DOCTYPE html>
<html>
<head>
<title>Menu</title>
<style>

body{
    background-size: cover;
    background-position: center, no-repeat;
}

a{
    text-decoration: none;
    color: black;
}

.box{
  width: 500px;
  height: 400px;
  background: white;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 30px 30px;
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
<body background="img/orderback.png">
<div class="sidebar">
  <a href="index.php">Home</a>
  <?php echo"<a href='list_menu.php?stud_id=$stud_id'>Menu</a>"?>
  <?php echo"<a href='menu.php?stud_id=$stud_id'>Make Order</a>"?>
  <?php echo"<a href='orders.php?stud_id=$stud_id'>My Order</a>"?>
</div>
<div>
	<form method="post"  action="menu.php?s_id=<?php echo $stud_id; ?>"  class="box">
        <h1 align="center">Enter Your Order</h1>
        <table border="2" align="center" bgcolor="white">
        <tr>
            <td>Food*</td>
            <td><select name="food">
            <option value=""> </option>
            <?php 

            $get_food = "select * from food ";

            $run_food = mysqli_query ($con,$get_food);

            while ($row_food = mysqli_fetch_array($run_food)){


              $food_id = $row_food ['food_id'];
              $food_name = $row_food ['food_name'];
              $food_price = $row_food ['food_price'];

            echo "<option value='$food_id'>$food_name (RM $food_price) </option>" ;
            }

            ?>
          </select></td>
        </tr>
        <tr>
            <td>Quantity*</td>
            <td><select name="num_food">
              <option value=""></option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select></td>
        </tr>
        <tr>
            <td>Beverage</td>
            <td><select name="drink">
            <option value=""> </option>
            <?php 

            $get_drink = "select * from drink ";

            $run_drink = mysqli_query ($con,$get_drink);

            while ($row_drink = mysqli_fetch_array($run_drink)){


              $drink_id = $row_drink ['drink_id'];
              $drink_name = $row_drink ['drink_name'];
              $drink_price = $row_drink ['drink_price'];

            echo "<option value='$drink_id'>$drink_name (RM $drink_price)</option>" ;
            }

            ?>
          </select></td>
        </tr>
        <tr>  
        	<td>Quantity</td>
            <td><select name="num_drink">
              <option value=""></option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select></td>
        </tr>
        <tr>
          <td>Place to delivered*</td>
          <td><select name="deliver">
            <option value=""> </option>
            <?php 

            $get_place = "select * from place_deliver ";

            $run_place = mysqli_query ($con,$get_place);

            while ($row_place = mysqli_fetch_array($run_place)){


              $deliver_id = $row_place ['deliver_id'];
              $place = $row_place ['place'];
              $time = $row_place['time'];

            echo "<option value='$deliver_id'>$place ($time) </option>" ;
            }

            ?>
          </select></td>
        </tr>
        <tr>    
            <td colspan="2" align="center"><button type="submit" name="insert">Submit</button>
            <button><a href="index.php">Cancel</a></button></td>
        </tr>
      </table>
      <br>
      ( * ) need to fill in the field.
      <br>
      Note : Only cash on delivery (COD) for payment, please bring enough money for the payment.
      <br>
      <p align="center"><?php echo"<button><a href='list_menu.php?stud_id=$stud_id'>See the Menu first</a></button>"?></p>
    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['insert'])){

    $stud_id = $_GET ['s_id'];

    $food = $_POST ['food'];
		$num_food = $_POST ['num_food'];
		$drink = $_POST ['drink'];
		$num_drink = $_POST ['num_drink'];
    $deliver = $_POST ['deliver'];

        if($food=='' OR $num_food=='' OR $deliver=='' )
        {
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        }
        else{

    $insert_or = "insert into orders_details(stud_id,order_time,food,num_food,drink,num_drink,deliver) 
    values ('$stud_id',NOW(),'$food','$num_food','$drink','$num_drink','$deliver')";
    
    $run_or= mysqli_query($con,$insert_or);

		if($run_or){
		
		echo "<script>alert ('Your order has been added! Please check [My Order] to see the price.')</script>";
		echo "<script>window.open('index.php','_self')</script>)";
		}
		else
		{
			echo"<script> alert('error')</script>";
		}


			
	}
}
?>