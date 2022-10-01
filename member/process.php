<?php
require '../config.php';
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['id'] != "") {
    echo "<script>location.href='../quiz/mypage.php';</script>";
    exit;
}

if ($_POST['type'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n올바른 경로로 접근해 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
    exit;
}

if ($_POST['type'] == "1") {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM student WHERE id=$number";
    $re = $con->query($sql);
    $info = mysqli_fetch_array($re);

    if (mysqli_num_rows($re) == 1) {
        echo "<script>alert('이미 등록된 학번입니다.\\n본인이 아닌 경우 관리자에게 연락바랍니다.');</script>";
        echo "<script>history.back()</script>;";
        exit;
    }

    $sql = "INSERT INTO student (id, name, password, status) VALUES($number, '$name', '$hash', 0)";
    $re = $con->query($sql);
    $_SESSION['id'] = $number;
    $_SESSION['name'] = $name;
    echo "<script>location.href='../quiz/mypage.php';</script>";
    exit;
}

if ($_POST['type'] == "2") {
    $number = $_POST['number'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM student WHERE id=$number";
    $re = $con->query($sql);
    $info = mysqli_fetch_array($re);
    
    if (mysqli_num_rows($re) == 1) {
        if (!password_verify($password, $info['password'])) {
            session_start();
            $_SESSION['id'] = "";
            echo "<script>alert('등록되지 않은 학번이거나 비밀번호가 잘못되었습니다.');</script>";
            echo "<script>history.back()</script>;";
            exit;
        } else {
            session_start();
            $_SESSION['id'] = $number;
            $_SESSION['name'] = $info['name'];
            echo "<script>location.href='../quiz/mypage.php';</script>";
            exit;
        }
    } else {
        session_start();
        $_SESSION['id'] = "";
        echo "<script>alert('등록되지 않은 학번이거나 비밀번호가 잘못되었습니다.');</script>";
        echo "<script>history.back()</script>;";
        exit;
    }
}

?>