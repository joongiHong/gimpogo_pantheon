<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['id'] == "") {
    echo "<script>location.href='.../index.php';</script>";
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
</head>
<body>
    <div id="title_bar">
        <img src="../image/logo.png" alt="김포고등학교 로고" />
        <p>김포고 미래캠프 심화탐구 활동</p>
    </div>
    <div id="intro_text">
        <div>
            <img src="../image/present.svg" height="150px" id="intro_text_icon" data-aos="fade-left" data-aos-duration="500"/>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">새 여정을</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">시작하기에 앞서</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em">몇 가지 안내</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em;">드리겠습니다.</h1>
        </div>
    </div>

    <div id="intro_text">
        <div>
    <?php
    switch ($_GET['step']) {
        case '1':
            echo "<h2>우선은, 제일 먼저</h2>";
            echo "<h2>옆에 있는 QR코드를 스캔해주세요!</h2>";
            echo "<p>포스터 옆에 부착된 QR코드는 여러분이 다음 단계 문제를 풀 수 있도록 사이트와 연결되어 있습니다! 한번 직접 스캔해보시겠어요? 기본 카메라 앱이나, 카카오톡, 네이버 앱을 사용하시면 됩니다.</p>";
            break;

        case '2':
            echo "<h2>좋아요! 지금 하신 것처럼</h2>";
            echo "<h2>곳곳에 숨겨진 QR을 찾아주세요.</h2>";
            echo "<p>메인 페이지에 표시되는 힌트를 참고하여 QR코드가 숨겨진 장소를 찾아 QR코드를 스캔해주세요. 단, 단계에 맞게 스캔해주셔야 합니다! 앞서서 나가지 않도록 해주세요~</p>";
            echo "<h2>모두 찾고 나면</h2>";
            echo "<h2>상품을 교환받으실 수 있습니다.</h2>";
            echo "<p>4단계까지 해결하시면 1학년 1반으로 오셔서 상품으로 교환 받으실 수 잇습니다. 선착순 10분에게만 상품을 드리니 꼭! 서둘러서 와주세요~</p>";
            echo "<div style='text-align: center;'>";
            echo '<a href="mypage.php" class="arrow-btn">여행 시작!</a>';
            echo "</div>";
            break;
    }
    ?>
        </div>
    </div>

    <footer>
        <hr />
        <p style="margin: 0;">김포고등학교 1학년 구자홍, 우지웅, 정수연, 하지민, 홍준기 제작.</p>
        <p style="margin: 0;">본 사이트 내 모든 정보는 김포고등학교의 공식 입장과 무관합니다.</p>
        <p style="margin: 0;">본 사이트를 이용하는 행위는 <a href="policy.php">이용약관과 개인정보처리방침</a>에 동의함을 의미합니다.</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>