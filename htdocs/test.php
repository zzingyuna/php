<?php

echo "<h2>test</h2>";

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

printf ("row count : %s", $result->num_rows);

echo "<br/>";
/*
// numeric array
$row = $result->fetch_array(MYSQLI_NUM);
printf ("%s %s\n", $row[0], $row[1]);

// associative array 
$row = $result->fetch_array(MYSQLI_BOTH);
printf ("%s (%s)\n", $row["idnew_table"], $row["new_tablecol"]);
*/
/*
for($count = 1 ; $count <=12 ; $count++){         // $count 를 1로 초기화 하고
   echo "$count times 12 is " . $count * 12;    // $count값에 따른 문장을 출력한다.
   echo "<br/>";                                        // 줄바꿈
}
*/

echo "<table border='1'>";
echo "<tr><td>idnew_table</td><td>new_tablecol</td></tr>";

$row_count = $result->num_rows;
for($count = 0 ; $count < $row_count ; $count++){         // $count 를 1로 초기화 하고
   $row = $result->fetch_array(MYSQLI_NUM);
   echo "<tr><td>";
   print $row[0] . "</td><td>" . $row[1];    // $count값에 따른 문장을 출력한다.
   echo "</td></tr>";
}

echo "</table>";

?>