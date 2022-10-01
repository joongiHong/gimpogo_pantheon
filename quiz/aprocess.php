<?php
require '../config.php';
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['id'] == "") {
    echo "<script>alert('로그인 후 접근해 주십시오.');</script>";
    echo "<script>location.href='../index.php';</script>";
    exit;
}

if ($_POST['code'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n올바른 경로로 접근해 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}


$code =  $_POST['code'];
$answer =  $_POST['answer'];
$st = $_SESSION['id'];

$sql = "SELECT * FROM question WHERE id=$code";
$re = $con->query($sql);
$info = mysqli_fetch_array($re);

$check = $info['answer'];

if ($answer == $check) {
    $sql = "UPDATE student SET status = $code WHERE id = $st";
    $re = $con->query($sql);
    echo "<script>alert('정답입니다!');</script>";
    echo "<script>location.href='mypage.php';</script>";
    exit;
} else {
    echo "<script>alert('오답입니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}
?> 