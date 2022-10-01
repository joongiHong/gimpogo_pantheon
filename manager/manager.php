<?php
require '../config.php';
header('Content-Type: text/html; charset=utf-8');

session_start();

if ($_POST['number'] == '1234' and $_POST['password'] == 'maxions12!') {
    $_SESSION['master'] = '1234';
} elseif ($_SESSION['master'] != "") {
} else {
    echo "<script>alert('로그인을 진행하거나,\\n고유번호나 비밀번호를 확인해주세요.');</script>";
    echo "<script>location.href='login.php';</script>";
    exit;
}

$sql = "SELECT * FROM student";
$re = $con->query($sql);
$nuum = mysqli_num_rows($re);
$per = intval($nuum) / 1006 * 100;

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <title>맥시언즈 메타버스</title>
</head>
<body>
    <div id="title_bar">
        <img src="../image/logo.png" alt="김포고등학교 로고" />
        <p>김포고 미래캠프 심화탐구 활동</p>
    </div>
    <div id="intro_text">
        <div>
            <img src="../image/cowork.svg" height="120px" id="intro_text_icon" data-aos="fade-left" data-aos-duration="500"/>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">맥시언즈 메타버스</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">운영진 사이트</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em">원하는 설정을</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em;">선택하세요.</h1>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2>얼마나 많은 학생들이</h2>
            <h2>참여하고 있을까요?</h2>
            <p><b>참여 학생수</b></p>
            <div style="text-align: right;">
                <?php echo "<h1>" . $nuum . "명</h1>" ?>
            </div>
            <p><b>참여율</b></p>
            <div style="text-align: right;">
                <?php echo "<h1>" . round($per, 1) . "%</h1>" ?>
            </div>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2>미션을 완료한 학생에게</h2>
            <h2>상품을 교환해주려면</h2>
            <div style="text-align: right;">
                <a href="change.php" class="arrow-btn">교환처리</a>
            </div>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2>운영진 사이트를 떠나시려면</h2>
            <div style="text-align: right;">
                <a href="session_out.php" class="arrow-btn">로그아웃</a>
            </div>
        </div>
    </div>

    <footer>
        <hr />
        <p style="margin: 0;">김포고등학교 1학년 구자홍, 우지웅, 정수연, 하지민, 홍준기 제작.</p>
        <p style="margin: 0;">본 사이트 내 모든 정보는 김포고등학교의 공식 입장과 무관합니다.</p>
        <p style="margin: 0;">본 사이트를 이용하는 행위는 <a href="../policy.php">이용약관과 개인정보처리방침</a>에 동의함을 의미합니다.</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>