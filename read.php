<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap\js\bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php  
  
$con=mysqli_connect("127.0.0.1","root","yunyun88","test");  
  
if (mysqli_connect_errno($con))  
{  
   echo "Failed to connect to MySQL: " . mysqli_connect_error();  
}  
 
 
mysqli_set_charset($con,"utf8");  
  
$res = mysqli_query($con,"select * from mytable2");  
   
?>
<div style="padding:10px;">
<h1>Data List</h1>

<table class="table table-hover">
<tr>
<td>id</td>
<td>title</td>
<td></td>
</tr>

<?php  
while($row = mysqli_fetch_array($res)){  
	echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td><a class='btn btn-default btn-xs' href='update.php?id=" 
	     . $row[0] . "'>수정</a><a class='btn btn-default btn-xs' href='delete.php?id=" . $row[0] . "'>삭제</a></td></tr>";
}  
?>
   
</table>

<br>

<a class="btn btn-primary" href="create.php">추가하기</a>
</div>
<?php 
mysqli_close($con);     
?>  
