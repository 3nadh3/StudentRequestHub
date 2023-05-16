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
else{
	$date = date("d-m-Y"); 
	$name = $_POST['name'];
	 $register_number = $_POST['register_number'];
	 $year = $_POST['year'];
	 $department = $_POST['department'];
	 $section = $_POST['section'];
	 $reason = $_POST['reason'];
	 $type_of_letter = $_POST['type_of_letter'];
	?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permission Letter</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-EdzI0yOkbjTc0Jj+sTlifBy+eJG0f0aA9xX9SDfGN6O/+NpNwOjDhRWhQI/6A+ym71xgC3Uohr9h7DBJHXL+BQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style> 
  .container {
			max-width: 800px;
			margin: auto;
			padding: 20px;
			background-color: white;
			box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
			border-radius: 5px;
			box-sizing: border-box;
			overflow: hidden;
		}
		h1 {
			text-align: center;
			margin-bottom: 20px;
			color: #444444;
		}
		p {
			margin-bottom: 10px;
			line-height: 1.5;
			color: #444444;
		}
		.footer {
			margin-top: 20px;
			text-align: right;
			color: #666666;
		}
		body{
			background-color: black;
		}
		.btns {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  top: 0;
  left: 0;

}

.btn:hover {
  background-color: RoyalBlue;
}
.print{
        margin: 0;
  position: absolute;
  top: 4%;
  right: 3%;
  
  
}
@media print {
  button {
    display: none;
  }
}	
	</style>
</head>
<body>
<a href="index.html">
<button class="btns" ><i class="fa fa-home"></i></button>
</a>
            <?php

			  switch ($type_of_letter) {
				case 'fees':
					$reason_text = 'delay in fee payment';
					break;
				case 'uniform':
					$reason_text = 'not wearing proper uniform';
					break;
				case 'absent':
					$reason_text = 'not attending classes';
					break;
				
				default:
					$reason_text = 'unknown reason';
			}

			  $letter_template = "
			  <p>To,\n
			   The Head of Department,\n
			   $department,\n
			   Sir CR Reddy Engineering college,\n
			   Sir,
			  	<p>
				     I am writing this letter to request permission for $type_of_letter. 
				    Due to $reason, I was unable to comply with the rules and regulations of the institute. I assure you that this will not happen again in the future. I kindly request you to grant me permission to continue attending the classes.Thank you for your understanding and cooperation in this matter.</p>
			  <p>Sincerely,\n
			  $name\n
			  $register_number\n
			  $year year, section $section\n
			  $date	</p>
		  ";
		  
		  $letter = sprintf($letter_template);
  
	
$query_of_letters= "INSERT INTO `permission`(`permission id`, `id`,`name`, `type of letter`, `reason`, `letter`, `time`, `status`) VALUES ('','$register_number','$name','$type_of_letter','$reason','$letter',current_timestamp(),2)";
$insert  = mysqli_query($connection,$query_of_letters);
if($insert== True)
{
	?>
	 <h1 align="center" class="text-success"><?php
						echo "submitted...";?></h1>
	

	<?php }
else{
	?>
	<h1 align="center" class="text-danger"><?php
	echo "Not Submitted...";?></h1>

	<?php
}
}
 ?>	



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-ivCgpcBHz9y0gD5Y8WbQw1N0K3ZbsCgE8FVzsKryPnFsd9XQ2nvhiEYVki/AHuZwyGOMV7r+DvLrV7aKXUp9yQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>