<html>
<head>
	<title>read</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" >
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" ></script>
	<script>

	</script>
</head>
<body>
	<h2>read</h2>
	<br/>
	<a href="create.php">생성하기</a>
	<br/>
</body>
</html>
<?php

//sql 접속 계정 정보
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'kyoona';
$mysql_db = 'test';

// 접속
$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

// charset 설정, 설정하지 않으면 기본 mysql 설정으로 됨, 대체적으로 euc-kr를 많이 사용
//mysql_query("set names utf8"); // charset UTF8

$query = "select * from new_table";
//쿼리 결과
$result = $mysqli->query( $query);

printf ("row count : %s<br/>", $result->num_rows);

echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr><td>idnew_table</td><td>new_tablecol</td><td colspan='2'>&nbsp;</td></tr>";

$row_count = $result->num_rows;
for($count = 0 ; $count < $row_count ; $count++){         // $count 를 1로 초기화 하고
   $row = $result->fetch_array(MYSQLI_NUM);
   echo "<tr><td>";
   print $row[0] . "</td><td>" . $row[1] . "</td><td><a href='update.php?id=" . $row[0] . "'>수정</a>" . "</td><td><a href='delete.php?id=" . $row[0] . "'>삭제</a>";    // $count값에 따른 문장을 출력한다.
   echo "</td></tr>";
}

echo "</table>";


if(isset($_POST['delete']))
{
 // variables for input data
 $input_data = $_POST['inputdata'];
 
 // [idnew_table]컬럼값에 넣을 데이터 만들기
 $getID = mysqli_fetch_assoc(mysqli_query($mysqli, "select max(idnew_table)+1 as myid from test.new_table"));
 $getIDValue = $getID['myid'];

 // 데이터 추가
 $sql_query = "INSERT INTO test.new_table(idnew_table,new_tablecol) VALUES('$getIDValue','$input_data')";

 //쿼리 결과
 $result = $mysqli->query( $sql_query);
 
}
$del_query = "DELETE FROM test.new_table WHERE idnew_table = ";


?>