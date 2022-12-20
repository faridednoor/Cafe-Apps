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
<title>Update Menu</title>
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
	<form method="post" enctype="multipart/form-data">
	<div>
    <h1>Update Image</h1>
    <table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
    <tr>
  
      <th>Image</th>
    
    </tr>
    <tr>
   <?php  
  
  include("includes/db.php");
        if(isset($_GET['food_id'])){
        
        $cm_id = $_GET['food_id'];  
        $get_fd = "select * from food where food_id ='$cm_id'";
        $run_fd = mysqli_query ($con,$get_fd);
        $row_fd = mysqli_fetch_array($run_fd);
          
          $food_image = $row_fd ['food_image'];
          
?>
              <tr>
                <th><input type="file" name="food_image" value="<?php echo $food_image ?>" required></th>
            
<?php } ?>

 <th> <button class="" type="submit" name="update_food">UPDATE</button></th>
  
  </tr>
    </table>
      </div>
	</form>
</body>
<p align="center"><?php echo"<button><a href='staff_food_menu.php?staff_id=$staff_id'>Cancel</a></button>"?></p>
</html>

<?php

if(isset($_POST['update_food'])){
    
  $id= $cm_id;
  $food_image = $_FILES['food_image']['name'];
  $temp_edit = $_FILES['food_image']['tmp_name'];

  move_uploaded_file($temp_edit,"images/$food_image");
      
    $insert_up= "update food set food_image='$food_image' where food_id='$id'";   
    $run_up= mysqli_query($con,$insert_up);
    
    echo "<script>alert ('Succesfully Updated $id')</script>";
    echo "<script>window.open('staff_food_menu.php?food_id=$id','_self')</script>";
        
  }     
  
?>
