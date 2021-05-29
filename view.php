
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body{
            background-image: url("top-line-management-login-background-1.jpg");
            padding-left: 5%;
            align-items: center;
        }
        #div1{
            text-align: center;
            padding-top: 25%;
        }
        #emloye{
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        #employe td,#employe th{
          border: 1px solid #ddd;
          padding: 8px;
        }

        #employe tr:nth-child(even){background-color: #f2f2f2;}

        #employe tr:hover {background-color: #ddd;}

        #employe th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #4CAF50;
          color: white;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="container">
    <form class="container">
    <div class="container" id="div1">
    
    
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
            window.alert('Log in Successful');
          </script>");
        $row=mysqli_query($conn,"SELECT name,email FROM interntable WHERE email='".$mail."' AND password='".$password."' ") or die(mysqli_error($conn));
        $name=$row->fetch_assoc();  
        }
        else{
            echo("<script LANGUAGE='Javascript'>
            window.alert('User Not Present, Try signing up');
            location.href='signup.html';
          </script>");
        }
        ?>
        <h3 text-align="center" style="font-size: x-large;">Welcome to the site <?php echo $name["name"]?></h3>;
    
    <pre text-align="center" style="font-size: x-large;">Your Login has successfully completed and
You are now a member of the community
             <h5>Congratulations!!!..</h5></pre>
    </div>


            <div class="container">
            <table style='width:100%' class='table table-hover' id='employe'>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>College ID</th>
                    <th>College name</th>
                    <th>College Address</th>
                    <th>Email</th>
                </tr>  



<?php

$mail=$name["email"];
$qry =mysqli_query($conn,"SELECT id,name,userid,cname,caddr,email FROM interntable WHERE email='".$mail."' ");
    while($row = $qry->fetch_assoc()) {
        ?>
        <tr>
          <td><?php echo $row["id"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["userid"]; ?></td>
          <td><?php echo $row["cname"]; ?></td>
          <td><?php echo $row["caddr"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          
        </tr>
        <?php
           }
    ?>

 


</table>

                   
    </div>
</form>
</div>
</body>
</html>