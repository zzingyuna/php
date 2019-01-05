<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap\js\bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
 if (!empty($_POST)) {
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
   
 $title = $_POST['title'];
 $content = $_POST['content'];

 $sql = "insert into mytable2 (title,content) values ('$title','$content')";
 if(mysqli_query($con,$sql)){
  echo 'success';
 }
 else{
  echo 'failure';
 }
 mysqli_close($con);
}
?>
<div style="padding:10px;">
<div class="panel panel-primary">
 <div class="panel-heading">New Insert</div>
 <div class="panel-body">
	<form action="create.php" method="post">
	
	<div class="form-group">
	 <label>Title</label>
	 <input name="title" type="text" class="form-control" placeholder="title" value="">
	</div>
	
	<div class="form-group">
	 <label>Content</label>
	 <input name="content" type="text" class="form-control" placeholder="content" value="">
	</div>
	
	<div class="form-group">
	 <button type="submit" class="btn btn-default">Create</button>
	 <a class="btn btn-default" href="read.php">Back</a>
	</div>
	
	</form> 
 </div>	
</div>
</div>