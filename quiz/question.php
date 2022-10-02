<?php
require '../config.php';
header('Content-Type: text/html; charset=utf-8');

session_start();
if ($_SESSION['id'] == "") {
    echo "<script>alert('로그인 후 접근해 주십시오.');</script>";
    echo "<script>location.href='../index.php';</script>";
    exit;
}

if ($_GET['code'] == "") {
    echo "<script>alert('비정상적 접근입니다.\\n올바른 경로로 접근해 주십시오.\\n\\n비정상적 접근이 반복되는 IP는 차단될 수 있습니다.');</script>";
    echo "<script>history.back()</script>;";
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
            <img src="../image/quiz.svg" height="110px" id="intro_text_icon" data-aos="fade-left" data-aos-duration="500"/>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">새로운 장소로</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="500">가기 위한</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em">관문에 오신 걸</h1>
            <h1 data-aos="fade-left" data-aos-duration="500" data-aos-delay="1200" style="font-size: 3em;">환영합니다.</h1>
        </div>
    </div>

    <?php
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM student WHERE id=$id";
    $re = $con->query($sql);
    $info = mysqli_fetch_array($re);
    $last_code = $info['status'];
    $focus = intval($last_code) + 1;
    
    $code = $_GET['code'];
    switch ($code) {
        case '123':
            if ($focus != '1') {
                echo "<script>alert('아직 풀이할 차례의 문제가 아니거나,\\n이미 풀이한 문제입니다.\\n\\n현재 풀어야 할 문제는 " . $focus . "번입니다.');</script>";
                echo "<script>history.back()</script>;";
                exit;
            }

            $quiz_number = 1;
            $sql = "SELECT * FROM question WHERE id=$quiz_number";
            $re = $con->query($sql);
            $info = mysqli_fetch_array($re);

            echo "<div id='intro_text'>";
                echo "<div>";
                    echo "<h2>Q. " . $info['question'] . "</h2>";
                    echo "<br/>";
                    echo '<form id="login" action="aprocess.php" method="POST" style="text-align: center;">';
                    echo "<input name='bridge' type='hidden' value='1' />";
                    echo "<input name='pccode' type='hidden' value='1' />";
                    echo "<input name='code' type='hidden' value='" . $quiz_number . "' />";
                    echo '<input name="answer" type="text" placeholder="정답" />';
                    echo '</form>';
                    echo '<div style="text-align: right;">';
                    echo '<a href="#" onclick="return chk_form()" class="arrow-btn">정답 확인</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            break;

        case '135':
            if ($focus != '2') {
                echo "<script>alert('아직 풀이할 차례의 문제가 아니거나,\\n이미 풀이한 문제입니다.\\n\\n현재 풀어야 할 문제는 " . $focus . "번입니다.');</script>";
                echo "<script>history.back()</script>;";
                exit;
            }
            
            $temp = array('2', '3', '4', '5', '6');
            $quiz_number = array_rand($temp, 2);

            echo "<div id='intro_text'>";
            echo "<div>";
            echo '<form id="login" action="aprocess.php" method="POST" style="text-align: center;">';
            echo "<input name='bridge' type='hidden' value='2' />";
            echo "<input name='pccode' type='hidden' value='2' />";

            for ($i = 0; $i <= 1; $i++) {
                $qn = $temp[$quiz_number[$i]];
                $sql = "SELECT * FROM question WHERE id=$qn";
                $re = $con->query($sql);
                $info = mysqli_fetch_array($re);
                    echo "<h2 id='qqq'>Q. " . $info['question'] . "</h2>";
                    echo "<br/>";
                    echo "<input name='code" . $i ."' type='hidden' value='" . $qn . "' />";
                    echo '<input name="answer' . $i . '" type="text" placeholder="정답" />';
                    echo '<br/>';
            }

            echo '</form>';
            echo '<div style="text-align: right;">';
            echo '<a href="#" onclick="return chk_form()" class="arrow-btn">정답 확인</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
            break;

        case '105':
            if ($focus != '3') {
                echo "<script>alert('아직 풀이할 차례의 문제가 아니거나,\\n이미 풀이한 문제입니다.\\n\\n현재 풀어야 할 문제는 " . $focus . "번입니다.');</script>";
                echo "<script>history.back()</script>;";
                exit;
            }

            $quiz_number = 7;
            $sql = "SELECT * FROM question WHERE id=$quiz_number";
            $re = $con->query($sql);
            $info = mysqli_fetch_array($re);

            echo "<div id='intro_text'>";
                echo "<div>";
                    echo "<h2>Q. " . $info['question'] . "</h2>";
                    echo "<br/>";
                    echo '<form id="login" action="aprocess.php" method="POST" style="text-align: center;">';
                    echo "<input name='bridge' type='hidden' value='1' />";
                    echo "<input name='pccode' type='hidden' value='3' />";
                    echo "<input name='code' type='hidden' value='" . $quiz_number . "' />";
                    echo '<input name="answer" type="text" placeholder="정답" />';
                    echo '</form>';
                    echo '<div style="text-align: right;">';
                    echo '<a href="#" onclick="return chk_form()" class="arrow-btn">정답 확인</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';

            break;

        case '145':
            if ($focus != '4') {
                echo "<script>alert('아직 풀이할 차례의 문제가 아니거나,\\n이미 풀이한 문제입니다.\\n\\n현재 풀어야 할 문제는 " . $focus . "번입니다.');</script>";
                echo "<script>history.back()</script>;";
                exit;
            }
            
            $temp = array('8', '9', '10', '11', '12');
            $quiz_number = array_rand($temp, 2);

            echo "<div id='intro_text'>";
            echo "<div>";
            echo '<form id="login" action="aprocess.php" method="POST" style="text-align: center;">';
            echo "<input name='bridge' type='hidden' value='2' />";
            echo "<input name='pccode' type='hidden' value='4' />";

            for ($i = 0; $i <= 1; $i++) {
                $qn = $temp[$quiz_number[$i]];
                $sql = "SELECT * FROM question WHERE id=$qn";
                $re = $con->query($sql);
                $info = mysqli_fetch_array($re);
                    echo "<h2 id='qqq'>Q. " . $info['question'] . "</h2>";
                    echo "<br/>";
                    echo "<input name='code" . $i ."' type='hidden' value='" . $qn . "' />";
                    echo '<input name="answer' . $i . '" type="text" placeholder="정답" />';
                    echo '<br/>';
            }

            echo '</form>';
            echo '<div style="text-align: right;">';
            echo '<a href="#" onclick="return chk_form()" class="arrow-btn">정답 확인</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
            break;
    }
    ?>

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