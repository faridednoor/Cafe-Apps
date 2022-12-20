<?php
session_start();
include("includes/db.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Added Food</title>
<style>

body{
    background-color: lightgreen;
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
	<form method="post" class="box">
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
            <td colspan="2" align="center"><button type="submit" name="insert">Add Food</button>
            <button><a href="food_menu.php">Cancel</a></button></td>
        </tr>
    </form>
</div>
</body>

</html>
<?php

if(isset($_POST['insert'])){

		
		$food_name = $_POST ['food_name'];
		$food_price = $_POST ['food_price'];

        if($food_name=='' OR $food_price=='' )
        {
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        }
        else{

		$insert_food= "insert into food (food_name,food_price) 
		values ('$food_name','$food_price')";
		
		$run_food = mysqli_query($con,$insert_food);
		
		if($run_food){
		
		echo "<script>alert ('Succesfully Added')</script>";
		echo "<script>window.open('food_menu.php','_self')</script>)";
		}
		else
		{
			echo"<script> alert('error')</script>";
		}


			
	}
}
?>