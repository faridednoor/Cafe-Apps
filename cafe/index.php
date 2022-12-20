<?php
session_start();
include("includes/db.php");

$c = $_SESSION['stud_user'];
    
    $get_c = "select * from student where stud_user ='$c'";
    
    $run_c = mysqli_query($con, $get_c);
    
    $row_c = mysqli_fetch_array($run_c);
        
    $stud_user = $row_c['stud_user'];
    $stud_id = $row_c['stud_id'];
    $stud_name = $row_c['stud_name'];

if(!isset($_SESSION['stud_user']))
{
    echo "<script>window.open('login.php','_self')</script>";    
}
else {

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Online Meal System (OMS)</title>
<style>

body{
    background-color: orange;
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

a{
  text-decoration: none;
  color: black;
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

.box1{
  width: 400px;
  height: 300px;
  top: 50%;
  left: 20%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 10px 10px;
  background-color: white;
  overflow: hidden;
}

.box2{
  width: 500px;
  height: 80px;
  top: 90%;
  left: 23.6%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 20px 10px;
  overflow: hidden;
}

</style>
</head>

<header>
<body>
<div class="navbar">
  <a id="Home" href="index.php">Home</a>
  <?php echo"<a href='list_menu.php?stud_id=$stud_id'>Menu</a>"?>
  <?php echo"<a href='menu.php?stud_id=$stud_id'>Make Order</a>"?>
  <?php echo"<a href='orders.php?stud_id=$stud_id'>My Order</a>"?>
  <?php echo"<a> </a>" ?>
  <?php echo"<a> </a>" ?>
  <?php echo"<a> </a>" ?>
  <?php echo"<a> </a>" ?>
  <!-- <?php echo"<a href='profile.php?stud_id=$stud_id'>My Profile</a>"?> -->
  <?php echo"<a href='logout.php?stud_id=$stud_id'>Logout</a>"?>
  </div>
</div>

<div class="box">
    <h1>WELCOME, </h1>
    <p><?php echo"$stud_name" ?></p>
    <br>
    <p>Let see what in menu we have?
    <?php echo"<button><a href='list_menu.php?stud_id=$stud_id'>Menu</a></button>"?></p> 
</div>
</body>
</header>
<div align="left" class="box1">
  <h4>Instruction to use the system:</h4>
  <h4>1. You can view food and beverage menu by click "Menu".</h4>
  <h4>2. After you done see the menu, then you click "Make Order" to place you order.</h4>
  <h4>3. You now can view you order at "My Order" to see the total price that you need to pay.</h4>
  <h4>4. You have successful order.Wait for your order at the place that you select.</h4>

</div>
</html>
<div align="left" class="box2">
  <h3>For more information you can call : 03 9874 0998</h3>
</div> 
<?php } ?>