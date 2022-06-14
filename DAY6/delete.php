<?php 
require 'dbConnection.php';

 $id = $_GET['id'];

 $sql = "delete from blog where id = $id"; 
 $op = mysqli_query($con, $sql);

 if($op){
    $message =  "Record Deleted";
 }else{
    $message =  'Error Try Again' . mysqli_error($con);
 }
 
    $_SESSION['message'] = $message;

    header("Location: index.php");
  
?>