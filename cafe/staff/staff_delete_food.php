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
<title>Delete Menu Details</title>
<style>

h1{
  text-align: center;
}

body{
    background-color: lightblue;
    padding: 50px;
    margin: 20px;
}

a{
  text-decoration: none;
  color: black;
}

</style>
</head>

<body>
	<form method="post" >
	<div>
    <h1>Delete Menu</h1>
    <table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
    <tr>
  
      <th>Are sure you want to delete?</th>
    
    </tr>
    <tr>
   <?php  
  
  include("includes/db.php");
        if(isset($_GET['food_id'])){
        
        $food_id = $_GET['food_id'];  
        $get_report = "select * from food where food_id ='$food_id'";
        $run_report = mysqli_query ($con,$get_report);
        $row_report=mysqli_fetch_array($run_report);
          
          $food_name = $row_report ['food_name'];
          $food_price = $row_report ['food_price'];
          
?>
              <tr>
                <th><input type="text" name="food_name" value= "<?php echo $food_name ?>">
                <input type="text" name="food_price" value= "<?php echo $food_price ?>"></th>
            
<?php } ?>

 <th> <button class="" type="submit" name="delete_food">DELETE</button></th>
  
  </tr>
    </table>
      </div>
	</form>
</body>
<p align="center"><?php echo"<button><a href='staff_food_menu.php?staff_id=$staff_id'>Cancel</a></button>"?></p>
</html>

<?php

if(isset($_POST['delete_food'])){

    $food_id= $food_id; 

    $insert_del = "delete from food where food_id='$food_id'";   
    $run_del = mysqli_query($con,$insert_del);
    
    echo "<script>alert ('Succesfully Deleted $food_id')</script>";
    echo "<script>window.open('staff_food_menu.php?food_id=$food_id','_self')</script>";
  
    }
?>