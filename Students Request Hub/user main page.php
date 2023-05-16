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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin page.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Permissions</title>
  <style> .buttonid{
    margin: 0;
    position: absolute;
    top: 4%;
    right: 3%;
} 
  </style>

</head>
<body>
    <?php
    $id=$_POST['id'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['user_id'] =$id;
    $_SESSION['password']=$password;
        ?>
    <br>
<div class="h4">Account ID: <?php echo $id; ?></div>
 <a href="permission form.html">
<button class="btn btn-primary btn-sm buttonid">Permission form</button>
 </a>
<br>
<div class="container-fluid px-2 "> 
    <div class="table-responsive">
    <table class="table table-responsive table-borderless">
        
      <thead>
        <tr class="bg-light">

           <th scope="col" width="20%">Date </th>
           <th scope="col" width="20%"> Name </th>
          <th scope="col" width="20%">Letter for</th>
          <th scope="col" width="25%">Reason</th>
          <th scope="col" width="20%">Status</th>
          <th scope="col" width="20%"> </th>
        </tr>    
      </thead>
  <tbody>
  <?php
      $id=$_SESSION['user_id'];
    $password=$_SESSION['password'];
    $query="SELECT * FROM `user` WHERE id='$id' AND password='$password'";
    $login=mysqli_query($connection,$query);
    $count = mysqli_num_rows($login);  
    $query_of_letters= "SELECT * FROM `permission` WHERE id='$id' ORDER BY `permission id` DESC";
    $print_letters=mysqli_query($connection,$query_of_letters);
    if($count==1)
    {
        while($rows=mysqli_fetch_assoc($print_letters))
        {
          $permission_id = $rows['permission id'];
      ?>
    <tr>  
          
      <td><?php echo $rows['time']; ?> </td>
      <td><?php echo $rows['name']; ?> </td>
      <td><?php echo $rows['type of letter']; ?> </td>
      <td><?php echo $rows['reason']; ?> </td>
      <?php
       $status= $rows['status'];
          if($status== 1)
          {
         ?>
         <<td><i class="fa fa-check-circle-o green"></i><span class="ms-1">Accepted</span></td>
         <?php
          } 
           if($status ==2)
          { ?>
            <td><i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1">Not accpeted</span></td>
          <?php
          }
        if($status== 0)
         { ?>
           <td><i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1"> Rejected</span></td>
         <?php

         }
         ?>
         <td>
         <form method="post">
             <input type="hidden" name="permission_id" value="<?php echo $permission_id;?>">
             <button type="submit" class="btn btn-primary btn-sm" name="print">print</button>
         </form>
     </td>
    <?php 
    }
      ?>
      </th>
    </tr>
    <?php }

    if(isset($_POST['print']))
      {
        header("location:admin.php");
        $permission_id_to_print = $_POST['permission_id'];
        $_SESSION['permission_id']=$permission_id_to_print;
      }
      ?>
    
  </tbody>
</table>
  
  </div>
    
</div>
<?php } ?>
</body>
</html>