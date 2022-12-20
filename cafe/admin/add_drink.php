<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Added Drink</title>
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
        <h1 align="center">Add Drink Menu</h1>
        <table border="2" align="center" bgcolor="white">
        <tr>
            <td>Drink Name</td>
            <td><input type="text" name="drink_name"></td>
        </tr>
        <tr>
            <td>Drink Price</td>
            <td><input type="text" name="drink_price"></td>
        </tr>
            <td colspan="2" align="center"><button type="submit" name="insert">Add Drink</button>
            <button><a href="drink_menu.php">Cancel</a></button></td>
        </tr>
    </form>
</div>
</body>

</html>
<?php

if(isset($_POST['insert'])){

		
		$drink_name = $_POST ['drink_name'];
		$drink_price = $_POST ['drink_price'];

        if($drink_name=='' OR $drink_price=='' )
        {
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        }
        else{

		$insert_drink= "insert into drink (drink_name,drink_price) 
		values ('$drink_name','$drink_price')";
		
		$run_drink = mysqli_query($con,$insert_drink);
		
		if($run_drink){
		
		echo "<script>alert ('Succesfully Added')</script>";
		echo "<script>window.open('drink_menu.php','_self')</script>)";
		}
		else
		{
			echo"<script> alert('error')</script>";
		}


			
	}
}
?>