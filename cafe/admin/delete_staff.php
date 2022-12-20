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
<title>Delete Orders Details</title>
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
	<form method="post" >
	<div>
    <h1>Delete Staff</h1>
    <table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
    <tr>
  
      <th>Are sure you want to delete?</th>
    
    </tr>
    <tr>
   <?php  
  
  include("includes/db.php");
        if(isset($_GET['staff_id'])){
        
        $staff_id = $_GET['staff_id'];  
        $get_report = "select * from staff where staff_id ='$staff_id'";
        $run_report = mysqli_query ($con,$get_report);
        $row_report=mysqli_fetch_array($run_report);
          
          $staff_name = $row_report ['staff_name'];
          $staff_user = $row_report ['staff_user'];
          
?>
              <tr>
                <th><input type="text" name="staff_name" value= "<?php echo $staff_name ?>">
                <input type="text" name="staff_user" value= "<?php echo $staff_user ?>"></th>
            
<?php } ?>

 <th> <button class="" type="submit" name="delete_staff">DELETE</button></th>
  
  </tr>
    </table>
      </div>
	</form>
</body>
<p align="center"><?php echo"<button><a href='staff.php?admin_id=$admin_id'>Cancel</a></button>"?></p>
</html>

<?php

if(isset($_POST['delete_staff'])){

    
    $staff_id= $staff_id; 

    $insert_del = "delete from staff where staff_id='$staff_id'";   
    $run_del = mysqli_query($con,$insert_del);
    
    
    echo "<script>alert ('Succesfully Deleted $staff_id')</script>";
    echo "<script>window.open('staff.php?staff_id=$staff_id','_self')</script>";
    
    
      
      
    }


      
  
?>
