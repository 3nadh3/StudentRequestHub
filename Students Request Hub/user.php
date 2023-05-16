<?php
$server_name="localhost:3307";
$user_name="root";
$password="";
$database_name='permission_project_database';
$connection= mysqli_connect($server_name,$user_name,$password,$database_name);
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}
else
{ 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title> login</title>
  <style>
    body{
      background-image: url("login bg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    h3{
      color: blue;
    }
    .btn {
        background-color: DodgerBlue;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        position: absolute;
        top: 2%;
        left: 10px;
      
      }
      
  </style>
</head>
  <body>  
    <?php
$id=$_POST['id'];
$password=$_POST['password'];
$query="SELECT * FROM `user` WHERE id='$id' AND password='$password'";
$login=mysqli_query($connection,$query);
$count = mysqli_num_rows($login);  
if($count==1)
{
    header('location:permission form.html');        
}
         
          
else
{ ?>

    <h1 align="center"><?php
    echo "The id & password are invalid";?></h1>
      <a href="index.html">
        <button class="btn"><i class="fa fa-arrow-left"></i></button>
        </a>
<?php
}
} ?>
</body>
</html>
