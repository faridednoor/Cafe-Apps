<?php
session_start();
include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome To OMS</title>
  <style>

body{
  background-size: cover;
  background-position: center, no-repeat;
}

.box{
  width: 900px;
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

<body background="img/cafesatria.jpg">
  <div>
    <form method="post" class="box">
      <h1 align="center">Welcome to OMS</h1>
        <h1 align="center">Login Here</h1>
          <table border="2" align="center" bgcolor="white">
            <tr>
              <td>Username</td>
              <td><input type="text" name="stud_user"></td>
            </tr>

            <tr>
              <td>Password</td>
              <td><input type="password" name="stud_pass"></td>
            </tr>

            <tr>
              <td colspan="2" align="right"><input type="submit" name="login" value="Submit"></td>
            </tr>
          </table>
          <br>
          <div align="center">
          Create Your Account Now!
          <a href="register.php">Register Here</a>
          <br>
          <a href="admin/admin_login.php">Admin Login Here</a>
          <br>
          <a href="staff/staff_login.php">Staff Login</a>
          </div>
          
        </form>
  </div>

</body>

</html>

<?php
if(isset($_POST['login'])){
  
  
  $stud_user = $_POST['stud_user'];
  $stud_pass = md5($_POST['stud_pass']);
  
  $sel_user = "select * from student where stud_user='$stud_user' AND stud_pass='$stud_pass'";
  
  $run_user = mysqli_query($con, $sel_user);
  
  $check_user = mysqli_num_rows($run_user);
  

if($check_user==1){
    
    $_SESSION['stud_user']=$stud_user;
    echo "<script>alert('You successfully login ! Welcome to Online Meal System !!!')</script>";
  
  echo "<script>window.open('index.php?logged_in=You Successfully Logged in!','_self')</script>";
  
  }
  else {
    echo "<script>alert('Username Email or Password is incorrect, try again')</script>";
  
    
  }
}

?>