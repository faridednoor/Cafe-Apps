<?php
session_start();

session_destroy();



echo "<script>window.open('admin_login.php?logout=You Successfully Logged Out ','_self')</script>";




?>