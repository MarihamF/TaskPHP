<?php

   require 'dbConnection.php';
   $sql = "select id,title,content,image from blog";
   $resultObj = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .m-r-1em{
            margin-right: 1em;
        }

        .m-b-1em{
            margin-bottom: 1em;
        }

        .m-l-1em{
            margin-left: 1em;
        }

        .mt0{
            margin-top: 0;
        }

    </style>

</head>

<body>

<div class="container">

<div class="page-header">

    <h1>The Blogs</h1>
    <br>

 <?php 
  
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
 
 ?>

</div>

<table class='table table-hover table-responsive table-bordered'>
    
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>image</th>
        <th>action</th>
    </tr>

<?php 
 while($raw = mysqli_fetch_assoc($resultObj)){
   
?>
    <tr>
        <td><?php  echo $raw['id'];  ?></td>
        <td><?php  echo $raw['title'];  ?></td>
        <td><?php  echo $raw['content'];  ?></td>
        <td><?php echo  '<img src="./uploads/' . $raw['image']. '" alt=""  height="60px" width="60px" >';?></td>
        <td>
            <a href='delete.php?id=<?php  echo $raw['id'];  ?>' class='btn btn-danger m-r-1em'>Delete</a>
            <a href='edit.php?id=<?php  echo $raw['id'];  ?>' class='btn btn-primary m-r-1em'>Edit</a>
        </td>
    </tr>

<?php } ?>
</table>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>