<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Staff</title>
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
  height: 500px;
  background: white;
  top: 50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding: 70px 30px;
}

</style>
</head>

<body background="img/addstaff.png">
<div>
	<form method="post" class="box">
	<h1 align="center">Add New Staff</h1>
	<table border="2" align="center" bgcolor="white">
        <tr>
            <td>Name</td>
            <td><input type="text" name="staff_name"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="staff_user"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="staff_pass"></td>
        </tr>
        <tr>
        	<td>Email</td>
            <td><input type="email" name="staff_email"></td>
        </tr>
        <tr>     
        	<td colspan="2" align="center"><button type="submit" name="insert">Add Staff</button>
        	<button><a href="staff.php">Cancel</a></button></td>
    	</tr>
    </table>
    </form>
</div>
</body>

</html>
<?php

if(isset($_POST['insert'])){

		
		$staff_name = $_POST ['staff_name'];
		$staff_user = $_POST ['staff_user'];
		$staff_pass = $_POST ['staff_pass'];
		$staff_email = $_POST ['staff_email'];

		if($staff_name=='' OR $staff_user=='' OR $staff_pass=='' OR $staff_email=='')
        {
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        }
        else{

          $passmd5 = md5($staff_pass);

		$insert_report= "insert into staff(staff_name,staff_user,staff_pass,staff_email) 
		values ('$staff_name','$staff_user','$passmd5','$staff_email')";
		
		$run_report= mysqli_query($con,$insert_report);
		
		if($run_report){
		
		echo "<script>alert ('Staff Succesfully Added')</script>";
		echo "<script>window.open('staff.php','_self')</script>)";
		}
		else
		{
			echo"<script> alert('error')</script>";
		}


			
	}
}
?>