<?php
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
?>

