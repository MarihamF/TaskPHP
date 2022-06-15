<?php 
require 'dbConnection.php';

 $id = $_GET['id'];

 $sql = "delete from pageviews where id = $id"; 
 $op = mysqli_query($con, $sql);

 if($op){
    $message =  "page Deleted";
 }else{
    $message =  'Error Try Again' . mysqli_error($con);
 }


   # Set Message Session 
    $_SESSION['message'] = $message;

    header("Location: display.php");


    
?>