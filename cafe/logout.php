<?php
session_start();

session_destroy();


echo "<script>alert ('Thank You For Using This System.')</script>";
echo "<script>window.open('login.php?logout=You Successfully Logged Out ','_self')</script>";




?>