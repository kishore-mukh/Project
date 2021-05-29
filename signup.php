<?php
$servername="localhost";
$username="root";
$password="";
$database="interndata";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Error at connecting to server".mysqli_connect_error());
}
$mail=$_POST['email'];
$password=$_POST['password'];
$name=$_POST['name'];
$userid=$_POST['userid'];
$cname=$_POST['cname'];
$caddr=$_POST['caddr'];
$resultset=mysqli_query($conn,"INSERT INTO interntable(name, userid, cname, caddr, email, password) VALUES ('$name','$userid','$cname','$caddr','$mail','$password')");

    echo("<script LANGUAGE='Javascript'>
    window.alert('New record Created');
    location.href='login.html';
    </script>");
    exit();
?>