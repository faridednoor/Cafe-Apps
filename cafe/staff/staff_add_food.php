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
<title>Menu</title>
<style>

body{
    background-color: lightblue;
    padding: 50px;
    margin: 20px;
}


a{
    text-decoration: none;
    color: black;
}

.box{
  width: 1100px;
  height: 500px;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 70px 30px;
}

</style>
</head>

<body background="img/register.jpg">
<div>
	<form method="post" class="box" enctype="multipart/form-data">
        <h1 align="center">Add Food Menu</h1>
        <table border="2" align="center" bgcolor="white">
        <tr>
            <td>Food Name</td>
            <td><input type="text" name="food_name"></td>
        </tr>
        <tr>
            <td>Food Price</td>
            <td><input type="text" name="food_price"></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="file" name="food_image"></td>
        </tr>
            <td colspan="2" align="center"><button type="submit" name="insert">Add Food</button>
            <button><a href="staff_food_menu.php">Cancel</a></button></td>
        </tr>
    </form>
</div>
</body>

</html>
<?php

if(isset($_POST['insert'])){

		
		$food_name = $_POST ['food_name'];
		$food_price = $_POST ['food_price'];
    $food_image = $_FILES ['food_image']['name'];
    $temp_name = $_FILES ['food_image']['tmp_name'];

 
        if($food_name=='' OR $food_price=='' OR $food_image=='')
        {
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        }
        else{

          move_uploaded_file($temp_name,"images/$food_image");

		$insert_food= "insert into food (food_name,food_price,food_image) 
		values ('$food_name','$food_price','$food_image')";
		
		$run_food = mysqli_query($con,$insert_food);
		
		if($run_food){
		
		echo "<script>alert ('Succesfully Added')</script>";
		echo "<script>window.open('staff_food_menu.php','_self')</script>)";
		}
		else
		{
			echo"<script> alert('error')</script>";
		}


			
	}
}
?>