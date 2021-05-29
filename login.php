<?php
$servername="localhost";
$username="root";
$password="";
$database="interndata";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo("Connection Error".mysqli_connect_error());
}
$mail=$_POST['email'];
$password=$_POST['password'];

$comd=mysqli_query($conn,"SELECT * FROM interntable WHERE email='".$mail."' AND password='".$password."' ") or die(mysqli_error($conn));
$count=mysqli_num_rows($comd);
if($count==1){
    echo("<script LANGUAGE='Javascript'>
    window.alert('Login Successful');
    location.href='view.php';
    </script>");
    exit();
}
else{
    echo("<script LANGUAGE='Javascript'>
    window.alert('User Not Present, Try signing up');
    location.href='signup.html';
    </script>");
}

?>