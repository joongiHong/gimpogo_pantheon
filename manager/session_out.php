<?php
session_start();
$_SESSION['master'] = "";
echo "<script>location.href='login.php';</script>";
?>