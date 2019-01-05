<?php

//sql 접속 계정 정보
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'kyoona';
$mysql_db = 'test';

// 접속
$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$id = $_GET['id'];

// 데이터 수정
$sql_query = "DELETE FROM test.new_table WHERE idnew_table = $id";

//쿼리 결과
$mysqli->query( $sql_query);
header("Location: read.php");
exit;

?>