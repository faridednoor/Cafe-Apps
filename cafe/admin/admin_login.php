<?php
session_start();
include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome For Order</title>
  <style>

body{
  background-size: cover;
  background-position: center, no-repeat;
}

a{
  margin-left: 390px;
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
  padding: 120px 30px;
}

  </style>
</head>

<body background="img/adminback.jpg">
  <div>
    <form method="post" class="box">
        <h1 align="center">Admin Login Here</h1>
          <table border="2" align="center" bgcolor="white">
            <tr>
              <td>Username</td>
              <td><input type="text" name="admin_user"></td>
            </tr>

            <tr>
              <td>Password</td>
              <td><input type="password" name="admin_pass"></td>
            </tr>

            <tr>
              <td colspan="2" align="right"><input type="submit" name="login" value="Submit"></td>
            </tr>
          </table>
          <br>
           <a href="../login.php">Student Login Here</a>
           <br>
           <a href="../staff/staff_login.php">Staff</a>
        </form>
  </div>

</body>

</html>

<?php
if(isset($_POST['login'])){
  
  
  $admin_user = $_POST['admin_user'];
  $admin_pass = $_POST['admin_pass'];
  
  $sel_user = "select * from admin where admin_user='$admin_user' AND admin_pass='$admin_pass'";
  
  $run_user = mysqli_query($con, $sel_user);
  
  $check_user = mysqli_num_rows($run_user);
  

if($check_user==1){
    
    $_SESSION['admin_user']=$admin_user;
    echo "<script>alert('You successfully login ! Welcome !!!')</script>";
  
  echo "<script>window.open('index.php?logged_in=You Successfully Logged in!','_self')</script>";
  
  }
  else {
    echo "<script>alert('Username Email or Password is incorrect, try again')</script>";
  
    
  }
}

?>