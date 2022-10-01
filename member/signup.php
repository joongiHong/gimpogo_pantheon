<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['id'] != "") {
    echo "<script>location.href='../quiz/mypage.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-243789192-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-243789192-1');
    </script>
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
            <img src="../image/moon.svg" height="150px" id="intro_text_icon" data-aos="fade-left" data-aos-duration="500"/>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" style="font-size: 1.8em">지금 들어오고 있는</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" style="font-size: 1.8em">버스는 메타버스입니다.</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em">티켓을</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em;">구입해주세요.</h1>
        </div>
    </div>

    <div id="main_text" style="text-align: center;">
        <form id="login" action="process.php" method="POST">
            <input name="type" type="hidden" value="1" />
            <input name="name" type="text" placeholder="이름" />
            <br/><br/>
            <input name="number" type="number" placeholder="학번" />
            <br/><br/>
            <input name="password" type="password" placeholder="비밀번호" />
        </form>
        <p style="color: white;">본 사이트에 가입하는 경우<br/><a href="../policy.php">이용약관과 개인정보 처리방침</a>에 동의함을 의미합니다.</p>
        <a href="#" onclick="return chk_form()" class="arrow-btn">티켓구매</a>
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