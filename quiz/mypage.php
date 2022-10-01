<?php
require '../config.php';
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['id'] == "") {
    echo "<script>alert('로그인 후 접근해 주십시오.');</script>";
    echo "<script>location.href='../index.php';</script>";
    exit;
}

$id = $_SESSION['id'];
$sql = "SELECT * FROM student WHERE id=$id";
$re = $con->query($sql);
$info = mysqli_fetch_array($re);
$last_code = $info['status'];

if ($last_code < ) # 여기서 부터 수정!!!!!!!!!!!!
$focus = intval($last_code) + 1;
$per = intval($last_code) / 12 * 100;

$sql = "SELECT * FROM question WHERE id=$focus";
$re = $con->query($sql);
$info = mysqli_fetch_array($re);
$hint = $info['hint'];
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
            <img src="../image/game.svg" height="180px" id="intro_text_icon" data-aos="fade-left" data-aos-duration="500"/>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">이곳은</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">여러분을 위한</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em">또 다른</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em;">김포고입니다.</h1>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2><?php echo $_SESSION['name']; ?> 여행자께선</h2>
            <h2>마지막 장소까지 얼마나 도달했을까요?</h2>
            <?php
            switch ($)
            ?>
            <p><b>달성율</b></p>
            <div style="text-align: right;">
                <?php echo "<h1>" . round($per, 1) . "%</h1>" ?>
            </div>
            <p><b>풀어야 하는 문제 번호</b></p>
            <div style="text-align: right;">
                <?php echo "<h1>" . $focus . "번 문제</h1>" ?>
            </div>
            <p><b>다음 장소에 대한 힌트</b></p>
            <div style="text-align: right;">
                <?php echo "<h1>" . $hint . "</h1>" ?>
            </div>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2>김포고 곳곳 숨겨진</h2>
            <h2>비밀의 장소를 찾았다면?</h2>

            <p><b>1. QR코드 스캔하기</b></p>
            <p>비밀의 장소에 부착된 QR코드를 스마트폰이나 태블릿의 카메라를 이용하여 스캔해주세요. 문제를 풀 수 있는 사이트로 연결됩니다.</p>

            <p><b>2. 로그인하기</b></p>
            <p>만일 로그인된 상태가 아니라면 로그인을 우선적으로 진행합니다. 가입하지 않았다면 가입도 진행해주세요!</p>

            <p><b>3. 퀴즈 해결하기</b></p>
            <p>연결된 페이지에 나타난 퀴즈를 해결해주세요! 정답이라면 이곳 페이지로 연결되어, 얼마나 도달했는지 확인할 수 있습니다.</p>

            <p><b>4. 마지막 장소까지 도달하고 상품받기</b></p>
            <p>마지막 장소까지 도달했다면 맥시언즈 운영진(1학년 1반)에게 오셔서 상품과 교환하시면 됩니다. 반드시 로그인된 화면을 보여주세요!</p>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2>여행을 하시면서</h2>
            <h2>다음 사항은 양지해주세요!</h2>

            <p><b>장소에 부착된 QR코드를 유출하지 않습니다.</b></p>
            <p>문제를 풀 수 있는 사이트로 연결되는 QR코드를 유출하셔선 안됩니다. 유출이 확인될 경우, 운영진 측에서 임의로 QR코드 접근을 차단하고, 교체할 수 있습니다.</p>

            <p><b>타인의 학번이나 부도덕한 이름은 사용하지 않습니다.</b></p>
            <p>타인의 학번을 이용해 가입하거나, 자신의 이름이 아닌, 사회적으로 부도덕한 이름을 대신 입력하는 경우 학교측의 요청에 따라 해당 사실이 전달될 수 있습니다.</p>

            <p><b>본 프로그램은 사전 통보없이 중단될 수 있습니다.</b></p>
            <p>1학년 학생들의 미래캠프 활동 중에 편성된 자체 주관 프로그램인 만큼, 엄연한 교육활동의 일환입니다. 따라서 모든 운영은 학교측의 통제하에 진행됩니다. 따라서 학교측에서 문제가 있다고 판단할 경우, 통보없이 중단될 수 있습니다.</p>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2>또 다른 김포고를 만든</h2>
            <h2>1학년의 이야기</h2>
            <div style="text-align: right;">
                <a href="../member/signin.php" class="arrow-btn">비하인드 스토리</a>
            </div>
        </div>
    </div>

    <div id="intro_text">
        <div>
            <h2>현실 속 김포고로 다시</h2>
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