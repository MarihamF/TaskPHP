<?php 
  require 'dbConnection.php';

 $sql = "select id,project,article,granularity,timestamp,access,agent,views from pageviews";

 $resultObj = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>THE PAGES</h1>
            <br>

         <?php 
          
            # Check if there is a message in the session 
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
         
         ?>
    
        </div>

        <table class='table table-hover table-responsive table-bordered'>
            
            <tr>
                <th>Id</th>
                <th>Project</th>
                <th>Article</th>
                <th>Granularity</th>
                <th>Timestamp</th>
                <th>Access</th>
                <th>Agent</th>
                <th>Views</th>
                <th>Action</th>
            </tr>

     <?php 
         while($raw = mysqli_fetch_assoc($resultObj)){
           
     ?>
            <tr>
                <td><?php  echo $raw['id'];  ?></td>
                <td><?php  echo $raw['project'];  ?></td>
                <td><?php  echo $raw['article'];  ?></td>
                <td><?php  echo $raw['granularity'];  ?></td>
                <td><?php  echo $raw['timestamp'];  ?></td>
                <td><?php  echo $raw['access'];  ?></td>
                <td><?php  echo $raw['agent'];  ?></td>
                <td><?php  echo $raw['views'];  ?></td>
                 <td>
                    <a href='delete.php?id=<?php  echo $raw['id'];  ?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='update.php?id=<?php  echo $raw['id'];  ?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>
            </tr>

    <?php } ?>

        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>