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
  width: 900px;
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
        <tr>
          <td>Image</td>
          <td><input type="file" name="drink_image"></td>
        </tr>
            <td colspan="2" align="center"><button type="submit" name="insert">Add Drink</button>
            <button><a href="staff_drink_menu.php">Cancel</a></button></td>
        </tr>
    </form>
</div>
</body>

</html>
<?php

if(isset($_POST['insert'])){

		
		$drink_name = $_POST ['drink_name'];
		$drink_price = $_POST ['drink_price'];
    $drink_image = $_FILES ['drink_image']['name'];
    $temp_name = $_FILES ['drink_image']['tmp_name'];

        if($drink_name=='' OR $drink_price=='' OR $drink_image=='' )
        {
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        }
        else{

          move_uploaded_file($temp_name,"images/$drink_image");

		$insert_drink= "insert into drink (drink_name,drink_price) 
		values ('$drink_name','$drink_price')";
		
		$run_drink = mysqli_query($con,$insert_drink);
		
		if($run_drink){
		
		echo "<script>alert ('Succesfully Added')</script>";
		echo "<script>window.open('staff_drink_menu.php','_self')</script>)";
		}
		else
		{
			echo"<script> alert('error')</script>";
		}


			
	}
}
?>