<?php 


// mebuat / atau menghapus akun sesion 
session_destroy();

echo "<script>window.location.href = 'login.php';</script>";
// header("Location: login.php");

?>