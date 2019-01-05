<?php

 if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

// 기본 타임존 설정
date_default_timezone_set('Asia/Seoul');
 
// 데이터베이스 테스트
$mysqli = new mysqli('localhost', 'root', 'kyoona', 'test');
if ($mysqli->connect_errno) {
		
    die('Connection Error ('.$mysqli->connect_errno.'): '.
    $mysqli->connect_error);
}
 
?>