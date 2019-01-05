
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>create</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" >
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" ></script>
</head>
<body>
<center>

<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td align="center"><h2><a href="read.php">back to main page</a></h2></td>
    </tr>
    <tr>
    <td><input type="text" name="inputdata" class="form-control"  placeholder="input data.." required /></td>
    </tr>
    <td><button type="submit" name="btn-save" class="btn btn-default navbar-btn"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>
<?php

//sql 접속 계정 정보
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'kyoona';
$mysql_db = 'test';

// 접속
$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if(isset($_POST['btn-save']))
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
 
 header("Location: read.php");
 exit;
}
?>

</center>
</body>
</html>