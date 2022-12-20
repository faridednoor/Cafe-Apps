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
<title>Update Orders Details</title>
<style>

h1{
  text-align: center;
}

body{
    background-color: lightgreen;
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
        if(isset($_GET['drink_id'])){
        
        $cm_id = $_GET['drink_id'];  
        $get_du = "select * from drink where drink_id ='$cm_id'";
        $run_du = mysqli_query ($con,$get_du);
        $row_du=mysqli_fetch_array($run_du);
          
          $drink_image = $row_du ['drink_image'];
          
?>
              <tr>
                <th><input type="file" name="drink_image" value="<?php echo $drink_image ?>" required></th>
            
<?php } ?>

 <th> <button class="" type="submit" name="update_drink">UPDATE </button></th>
  
  </tr>
    </table>
      </div>
	</form>
</body>
<p align="center"><?php echo"<button><a href='drink_menu.php?admin_id=$admin_id'>Cancel</a></button>"?></p>
</html>

<?php

if(isset($_POST['update_drink'])){
 
  $id= $cm_id;
  $drink_image = $_FILES['drink_image']['name'];
  $temp_edit = $_FILES['drink_image']['tmp_name'];

  move_uploaded_file($temp_edit,"../staff/images/$drink_image");
     
  $insert_up= "update drink set drink_image='$drink_image' where drink_id='$id'";   
  $run_up= mysqli_query($con,$insert_up);
    
    echo "<script>alert ('Succesfully Updated Image $id')</script>";
    echo "<script>window.open('drink_menu.php?drink_id=$id','_self')</script>";
    
  
  }     
  
?>
