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
	<title>Registration Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		form {
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px #ccc;
			max-width: 500px;
			margin: 20px auto;
		}
		h2 {
			text-align: center;
			margin-top: 0;
		}
		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}
		input[type="text"],
		select {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 10px;
			box-sizing: border-box;
			font-size: 16px;
			background-color: #fff;
			resize: none;
		}
		select {
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23444' d='M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z'/%3E%3C/svg%3E");
			background-repeat: no-repeat;
			background-position: right 10px center;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		.error {
			color: red;
			font-weight: bold;
			margin-bottom: 10px;
		}
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
          }
		@media screen and (max-width: 600px) {
			form {
				max-width: 100%;
			}
            a {
                margin-top: 40px;
              }
		}
		.arrow {
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
    <div class="container-lg">
        <div class="row justify-content-center">
            <img src="img.jpg" alt="sir CR Reddy college of enginerring" class="img-fluid m-3">
        </div>
    </div>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form method="post">
					<h2 class="mb-3 fw-bold">ADMIN LOGIN</h2>
                    <div class="mb-3">
						<label for="id" class="form-label">ID:</label>
						<input type="text" id="id" name="id" class="form-control" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">password:</label>
						<input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="login">LOGIN</button>
                    </div>
                </form>
            </div>
            <br>
			<?php 
			 
			 if(isset($_POST['login']))
			 {
				    $id=$_POST['id'];
					$password=$_POST['password'];
					$query="SELECT * FROM `admin` WHERE id='$id' AND password='$password'";
					$login=mysqli_query($connection,$query);
					$count = mysqli_num_rows($login);  
					
					if($count==1)
					{
						header('location:admin page.php');
					}
					else
					{ ?>
						<h1 align="center"><?php
						echo "The id & password are invalid";?></h1>
						<a href="login.html">
							<button class="btn"><i class="fa fa-arrow-left"></i></button>
        				</a>
					<?php
					}
				}

				
			}
			?>
			<a href="index.html">
			<button class="arrow"><i class="fa fa-arrow-left"></i></button>
			</a>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-SdJ7z6/eF9I9VRU6SsSyu1E7sHRa/hvA8OSwWnkg/ZG7VpTcJvT8/LnW+gnOnZYApgNbdNq3qMtwlrWZt/ED7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        </body>
        </html>
					
