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
      .print{
        margin: 0;
    position: fixed;
  top: 4%;
  right: 13%;
  
  
}
@media print {
  button {
    display: none;
  }
}	
      
  </style>
</head>
  <body>  
    <?php
  session_start();
  $permission_id_to_print = $_SESSION['permission_id'];
$query_of_letters= "SELECT * FROM `permission` where `permission id`=$permission_id_to_print ORDER BY `permission id` DESC;";
$print_letters=mysqli_query($connection,$query_of_letters);

    while($rows=mysqli_fetch_assoc($print_letters))
    {
      ?>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header">
            <h2 class="text-center" align="center">Permission Letter</h2>
          </div>
          <div class="card-body">
        
    <div class="alert alert-success" style="text-align: justify;">
			
    <?php
         echo nl2br($rows['letter']) ?></h3>
         <?php
         $status= $rows['status'];
         if($status== 1){
          ?>
          <i class="fa fa-check-circle-o green"></i><span class="ms-1"><?php echo "Permission Granted"; ?></span>
          
         <?php } 
         else if($status==0){
          ?>
          <i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1"> <?php echo "Permission Rejected"; ?> </span>
        
        <?php }
         else if($status==2){
          ?>
          <i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1"><?php echo "Permission not yet accpeted"; ?></span>
         <?php }
         ?>
         <br>
         <br>
         <div class="text-muted" style="opacity: 0.5;"> <?php echo $rows['permission id']; ?>
         </div>
    </div>

           
        
    <?php 
    }

    ?>
          </div>
        </div>
      </div>
    </div>
  </div>
          <a href="index.html"> 
        <button class="btn"><i class="fa fa-home"></i></button>
        </a>
    <div class="print">
 <div id="content">
<button onclick="window.print();" class="btn btn-primary" id="print-btn"  style="cursor: pointer;">Print</button>
 </div>
 </div> 
<?php
}
?>
  </body>
</html>