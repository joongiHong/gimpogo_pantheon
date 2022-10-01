<?php
session_start();
$_SESSION['id'] = "";
$_SESSION['name'] = "";
echo "<script>location.href='../index.php';</script>";
?>