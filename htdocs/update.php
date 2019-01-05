<?php

//sql 접속 계정 정보
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'kyoona';
$mysql_db = 'test';

// 접속
$mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

$id = $_GET['id'];

// 선택한 정보의 데이터를 가져온다
$select_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM test.new_table WHERE idnew_table = $id"));

if(isset($_POST['btn-save']))
{
 // variables for input data
 $input_data = $_POST['inputdata'];
 
 // 데이터 수정
 $sql_query = "UPDATE test.new_table SET new_tablecol = '$input_data' WHERE idnew_table = $id";

 //쿼리 결과
 $mysqli->query( $sql_query);
 header("Location: read.php");
 exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" >
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" >
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" ></script>
<script>
function the_function() {
    location = "read.php";
}
</script>
</head>
<body>
<center>

<div id="body">
 <div id="content">
	<h2><a href="read.php">back to main page</a></h2>
    <form method="post">
    <table border=1 cellspacing='0' cellpadding='10'>
		<tr>
			<td>id : </td>
			<td><?php echo $_GET['id']; ?></td>
		</tr>
		<tr>
			<td>content : </td>
			<td><input type="text" name="inputdata" class="form-control"  value="<?php echo $select_data['new_tablecol'];?>"/></td>
		</tr>
			<td colspan='2' align='center'>
				<button type="submit" name="btn-save" class="btn btn-default navbar-btn"><strong>SAVE</strong></button>
				<button type="button" name="btn-cancel" onclick="the_function()" class="btn btn-default navbar-btn"><strong>CANCEL</strong></button>
			</td>
		</tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>