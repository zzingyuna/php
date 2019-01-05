
<?php
$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
	
  define('HOST','127.0.0.1');
  define('USER','root');
  define('PASS','yunyun88');
  define('DB','test');
  $con = mysqli_connect(HOST,USER,PASS,DB);

	if (mysqli_connect_errno($con))  
	{  
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	}  
 
	mysqli_set_charset($con,"utf8");  

	echo $id."<br>";
	
	$sql = "delete from mytable2 where id = $id";
	if(mysqli_query($con,$sql)){
		echo 'success';
		header("Location: read.php");
	}
	else{
		echo 'failure';
	}
	mysqli_close($con);
?>
