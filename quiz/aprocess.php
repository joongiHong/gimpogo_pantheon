<?php
require '../config.php';
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['id'] == "") {
    echo "<script>alert('로그인 후 접근해 주십시오.');</script>";
    echo "<script>location.href='../index.php';</script>";
    exit;
}

if ($_POST['bridge'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n올바른 경로로 접근해 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}
$st = $_SESSION['id'];

switch ($_POST['bridge']) {
    case '1':
        $code =  $_POST['code'];
        $answer =  $_POST['answer'];
        $pccode = $_POST['pccode'];

        $sql = "SELECT * FROM question WHERE id=$code";
        $re = $con->query($sql);
        $info = mysqli_fetch_array($re);

        $check = $info['answer'];

        if ($answer == $check) {
            $sql = "UPDATE student SET status = $pccode WHERE id = $st";
            $re = $con->query($sql);
            echo "<script>alert('정답입니다!');</script>";
            if ($pccode == '1') {
                echo "<script>location.href='tutorial.php?step=2';</script>";
                exit;
            }
            echo "<script>location.href='mypage.php';</script>";
            exit;
        } else {
            echo "<script>alert('오답입니다.');</script>";
            echo "<script>history.back()</script>;";
            exit;
        }

    case '2':
        $pccode = $_POST['pccode'];

        $code0 = $_POST['code0'];
        $answer0 = $_POST['answer0'];
        $code1 = $_POST['code1'];
        $answer1 = $_POST['answer1'];

        $sql = "SELECT * FROM question WHERE id=$code0";
        $re = $con->query($sql);
        $info = mysqli_fetch_array($re);

        $check0 = $info['answer'];

        $sql = "SELECT * FROM question WHERE id=$code1";
        $re = $con->query($sql);
        $info = mysqli_fetch_array($re);

        $check1 = $info['answer'];

        if ($answer0 == $check0 and $answer1 == $check1) {
            $sql = "UPDATE student SET status = $pccode WHERE id = $st";
            $re = $con->query($sql);
            echo "<script>alert('정답입니다!');</script>";
            echo "<script>location.href='mypage.php';</script>";
            exit;
        } else {
            echo "<script>alert('오답입니다.');</script>";
            echo "<script>history.back()</script>;";
            exit;
        }
}
?> 