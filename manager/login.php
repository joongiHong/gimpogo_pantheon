<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['master'] != "") {
    echo "<script>location.href='manager.php';</script>";
    exit;
}
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
    <script>
	function chk_form() {
		document.getElementById('login').submit();
	}
	</script>
</head>
<body>
    <div id="title_bar">
        <img src="../image/logo.png" alt="김포고등학교 로고" />
        <p>김포고 미래캠프 심화탐구 활동</p>
    </div>
    <div id="intro_text">
        <div>
            <img src="../image/cowork.svg" height="120px" id="intro_text_icon" data-aos="fade-left" data-aos-duration="500"/>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" style="font-size: 1.8em">맥시언즈 메타버스</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" style="font-size: 1.8em">운영진 사이트</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em">부여받은 계정을</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em;">입력해주세요.</h1>
        </div>
    </div>

    <div id="main_text" style="text-align: center;">
        <form id="login" action="manager.php" method="POST">
            <input id="number" name="number" type="number" placeholder="고유번호" />
            <br/><br/>
            <input id="password" name="password" type="password" placeholder="비밀번호" />
        </form>
        <a href="#" onclick="return chk_form()" class="arrow-btn">로그인</a>
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