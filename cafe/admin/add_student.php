<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Student</title>
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
  width: 1100px;
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

<body background="img/register.jpg">
<div>
	<form method="post" class="box">
        <h1 align="center">Add New Student</h1>
        <table border="2" align="center" bgcolor="white">
        <tr>
            <td>Full Name</td>
            <td><input type="text" name="stud_name"></td>
        </tr>
        <tr>
            <td>Matrix Number</td>
            <td><input type="text" name="stud_matrix"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="stud_user"></td>
        </tr>
        <tr>  
        	<td>Email</td>
            <td><input type="email" name="stud_email"></td>
        </tr>
        <tr>
        	<td>Faculty</td>
            <td><input type="text" name="stud_depart"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="stud_pass"></td>
        </tr>
        <tr>    
            <td colspan="2" align="center"><button type="submit" name="insert">Add Student</button>
            <button><a href="student.php">Cancel</a></button></td>
        </tr>
    </form>
</div>
</body>

</html>
<?php

if(isset($_POST['insert'])){

		
		$stud_name = $_POST ['stud_name'];
		$stud_matrix = $_POST ['stud_matrix'];
		$stud_user = $_POST ['stud_user'];
		$stud_pass = $_POST ['stud_pass'];
		$stud_email = $_POST ['stud_email'];
		$stud_depart = $_POST ['stud_depart'];

        if($stud_name=='' OR $stud_matrix=='' OR $stud_user=='' OR $stud_pass=='' OR $stud_email=='' OR $stud_depart=='' )
        {
            echo "<script>alert('Please fill all the fields!')</script>";
            exit();
        }
        else{

            $passmd5 = md5($stud_pass);

		$insert_stud= "insert into student (stud_name,stud_matrix,stud_user,stud_pass,stud_email,stud_depart) 
		values ('$stud_name','$stud_matrix','$stud_user','$passmd5','$stud_email','$stud_depart')";
		
		$run_stud= mysqli_query($con,$insert_stud);
		
		if($run_stud){
		
		echo "<script>alert ('Succesfully Added')</script>";
		echo "<script>window.open('student.php','_self')</script>)";
		}
		else
		{
			echo"<script> alert('error')</script>";
		}


			
	}
}
?>