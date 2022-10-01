<?php
require '../config.php';
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['master'] == "") {
    echo "<script>alert('로그인 후 접근해 주십시오.');</script>";
    echo "<script>location.href='login.php';</script>";
    exit;
}

if ($_POST['type'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n올바른 경로로 접근해 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if ($_POST['type'] == "1") {
    $number = $_POST['number'];
    $sql = "UPDATE student SET status = 99 WHERE id = $number";
    $re = $con->query($sql);
    echo "<script>alert('교환 처리 되었습니다.');</script>";
    echo "<script>location.href='change.php';</script>";
    exit;
}
?>