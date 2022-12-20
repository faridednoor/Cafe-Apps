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
<title>Staff Detail</title>
<style>
body{
	background-color: lightgreen;
	margin: 50px;
}

h1{
	text-align: center;
}

/* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
table.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  table {
    width: 100%;
    height: auto;
    position: relative;
  }
  table {float: left;}
  table.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  table {
    text-align: center;
    float: none;
  }
}

a{
  text-decoration: none;
  color: black;
}

</style>
</head>

<body>
	<div class="sidebar">
  <a href="index.php">Home</a>
  <?php echo"<a href='staff.php?admin_id=$admin_id'>Staff</a>"?>
  <?php echo"<a href='student.php?admin_id=$admin_id'>Student</a>"?>
  <!-- <?php echo"<a href='food_menu.php?admin_id=$admin_id'>Food Menu</a>"?>
  <?php echo"<a href='drink_menu.php?admin_id=$admin_id'>Beverage Menu</a>"?>
  <?php echo"<a href='orders.php?admin_id=$admin_id'>Order Detail</a>"?> -->
  <a href="admin_logout.php">Logout</a>
</div>
<div>
<h1>Staff Detail</h1>
<form>	
	<table width="800" border="2" align="center" cellpadding="2" cellspacing="2" bgcolor="white">
	<tr>
    <tr>     
          <td colspan="4" align="right">
          <button><a href="add_staff.php">Add New Staff</a></button></td>
      </tr>
		<th>Name</th>
		<th>Username</th>
		<th>Email</th>
    <th>Delete</th>
	</tr>
</form>
</div>

<?php

$sel_staff = "select * from staff";
$view_staff = mysqli_query($con, $sel_staff);

	while ($row = mysqli_fetch_array($view_staff)) {
	$staff_id = $row['staff_id'];
$staff_name = $row['staff_name'];
$staff_user = $row['staff_user'];
$staff_email = $row['staff_email'];

    echo "
<tr>
    <td>$staff_name</td>
    <td> $staff_user </td>
    <td> $staff_email</td>
    <td><a href='delete_staff.php?staff_id=$staff_id'>Delete</a></td>
</tr>
   ";
  }

  echo "</table>";

?>

</body>
</html>