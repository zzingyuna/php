<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap\js\bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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

	$result = mysqli_query($con,"select * from mytable2 where id = $id");  
   
	$row = mysqli_fetch_assoc($result);
?>

<?php
if (!empty($_POST)) {
  
 $title = $_POST['title'];
 $content = $_POST['content'];

 $sql = "update mytable2 set title = '$title' , content = '$content' where id = $id";
 if(mysqli_query($con,$sql)){
  echo 'success';
  
	$result = mysqli_query($con,"select * from mytable2 where id = $id");  
   
	$row = mysqli_fetch_assoc($result);
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
	<form action="update.php?id=<?php echo $id ?>" method="post">
	 
		<div class="form-group">
		 <label>Id</label>
		 <input name="title" type="text" class="form-control" readonly="readonly" value="<?php echo $id;?>">
		</div>
		
		<div class="form-group">
		 <label>Title</label>
		 <input name="title" type="text" class="form-control" placeholder="title" value="<?php echo $row['title'];?>">
		</div>
		
		<div class="form-group">
		 <label>Content</label>
		 <input name="content" type="text" class="form-control" placeholder="content" value="<?php echo $row['content'];?>">
		</div>
		
		<div class="form-group">
		 <button type="submit" class="btn btn-default">Update</button>
		 <a class="btn btn-default" href="read.php">Back</a>
		</div>
		
	</form> 
 </div>
</div>
</div>