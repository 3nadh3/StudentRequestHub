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
</head>
<body>
  <br>

<div class="container-fluid">
    
    <div class="table-responsive">
    <table class="table table-responsive table-borderless">
        
      <thead>
        <tr class="bg-light">

           <th scope="col" width="18%">Date </th>
           <th scope="col" width="18%">Register ID</th>
           <th scope="col" width="18%"> Name </th>
          <th scope="col" width="18%">Letter for</th>
          <th scope="col" width="18%">Reason</th>
          <th scope="col" width="18%">Status</th>
          <th scope="col" width="5%"> Action  </th>
      </thead>
  <tbody>
  <?php 
$query_of_letters= "SELECT * FROM `permission` ORDER BY `permission id` DESC;";
$print_letters=mysqli_query($connection,$query_of_letters);
while($rows=mysqli_fetch_assoc($print_letters))
{
    $permission_id = $rows['permission id'];
?>
<tr> 
    <td><?php echo $rows['time']; ?> </td>
    <td><?php echo $rows['id']; ?> </td>
    <td><?php echo $rows['name']; ?> </td>
    <td><?php echo $rows['type of letter']; ?> </td>
    <td><?php echo $rows['reason']; ?> </td>
    <?php
    $accepted= $rows['status'];
    if($accepted== 1)
    {
    ?>
        <td><i class="fa fa-check-circle-o green"></i><span class="ms-1">Accepted</span></td>
    <?php 
    } 
    else if($accepted==2)
    { ?>
        <td><i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1">Not accepted</span></td>
    <?php
    }
    else if($accepted== 0)
    { ?>
        <td><i class="fa fa-dot-circle-o text-danger"></i><span class="ms-1">Rejected</span></td>
    <?php
    }

    ?>
    <td>
        <form method="post">
            <input type="hidden" name="permission_id" value="<?php echo $permission_id;?>">
            <button type="submit" class="btn btn-success" name="accept">Accept</button>
        </form>
    </td>
    <td>
        <form method="post">
            <input type="hidden" name="permission_id" value="<?php echo $permission_id;?>">
            <button type="submit" class="btn btn-danger" name="reject">Reject</button>
        </form>
    </td>
</tr>
<?php
}
if(isset($_POST['accept']))
{
    $permission_id = $_POST['permission_id'];
    $updating_to_accept = "UPDATE `permission` SET `status`= 1  WHERE `permission`.`permission id` = '$permission_id';";
    $updating_of_accept = mysqli_query($connection,$updating_to_accept);
}

if(isset($_POST['reject']))
{
    $permission_id = $_POST['permission_id'];
    $updating_to_reject = "UPDATE `permission` SET `status` = 0 WHERE `permission`.`permission id` = '$permission_id';";
    $updating_of_reject = mysqli_query($connection,$updating_to_reject);
}
?>
      
       </th>
   
    </tbody>
</table>
  
  </div>
    
</div>
      
<?php 
}
 ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-8mfNyZaU6Rd/PzIGMWf/M9q3zG0n6PrT40eNTlBsyd8BZDfuvbOIP+6icdhafX9CxDyL2sEdRDwZwOJ1aHY8EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>