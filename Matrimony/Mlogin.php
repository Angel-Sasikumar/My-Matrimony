<?php
$uname = $_POST['uname'];
$password1 = $_POST['password1']; 

$conn = new mysqli('localhost','root','','matrimony');
if($conn->connect_error){
    die('connection Failed: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("select * from mregister where uname = ?");
    $stmt->bind_param("s",$uname);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0){
      $data=$stmt_result->fetch_assoc();
      if($data['password1'] === $password1 ){
         header("location:http://localhost/Matrimony/Msuccess.html") ;
      }else{
         echo "<h2>Invalid UserName or Password</h2>";
      }
    }else{
      echo "<h2>Invalid UserName or Password</h2>";
    }
}
?>