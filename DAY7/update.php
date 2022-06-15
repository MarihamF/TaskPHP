<?php

require 'dbConnection.php';
#get the data of the blog
$id = $_GET['id'];
$sql = "select id,project,article,granularity,timestamp,access,agent,views from pageviews where id = $id";
$resultObj = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($resultObj);
# Clean Function to sanitize the data
function Clean($input)
{
    return stripslashes(strip_tags(trim($input)));
}



# Server Side Code . . . 
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $project    = Clean($_POST['project']);
    $article = Clean($_POST['article']);
    $granularity = Clean($_POST['granularity']);
    $timestamp = Clean($_POST['timestamp']);
    $access = Clean($_POST['access']);
    $agent = Clean($_POST['agent']);
    $views = Clean($_POST['views']);
    # Validate ...... 
    $errors = [];

    # validate project
    if(empty($project))
    {
        $errors['project']="please enter a project";
    }
    if(!ctype_alpha(str_replace(' ', '', $project)))
    {
        $errors['project']="please enter letters only";
    }
  # validate article
  if(empty($article))
  {
      $errors['article']="please enter a article";
  }
  if(!ctype_alpha(str_replace(' ', '', $article)))
  {
      $errors['article']="please enter letters only";
  }
    # validate granularity
    if(empty($project))
    {
        $errors['granularity']="please enter a granularity";
    }
    if(!ctype_alpha(str_replace(' ', '', $granularity)))
    {
        $errors['granularity']="please enter letters only";
    }
      # validate timestamp
      if(empty($timestamp))
      {
          $errors['timestamp']="please enter a timestamp";
      }
      /*if(!ctype_alpha(str_replace(' ', '', $timestamp)))
      {
          $errors['timestamp']="please enter letters only";
      }*/
        # validate access
    if(empty($access))
    {
        $errors['access']="please enter a access";
    }
    if(!ctype_alpha(str_replace(' ', '', $access)))
    {
        $errors['access']="please enter letters only";
    }
     # validate agent
     if(empty($agent))
     {
         $errors['agent']="please enter a agent";
     }
     if(!ctype_alpha(str_replace(' ', '', $access)))
     {
         $errors['agent']="please enter letters only";
     }


    # Check ...... 
    if (count($errors) > 0) {
        // print errors .... 

        foreach ($errors as $key => $value) {
            # code...

            echo '* ' . $key . ' : ' . $value . '<br>';
        }
    }
    else
    { 
        
    $sql = "update pageviews set project = '$project', article= '$article', granularity='$granularity',timestamp='$timestamp', access='$access',
      agent='$agent', views='$views' where id = $id";

    $op =  mysqli_query($con, $sql);

    if ($op) {
        $message =  "Success , the page Updated";

        $_SESSION['message'] = $message;
        
        header('Location: display.php');
        exit(); 

    } 

    else
    {
        echo "Failed , " . mysqli_error($con);
    }

}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>update the page</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$data['id'];?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputtitle">project</label>
                <input type="text" class="form-control" required id="exampleInputproject" value="<?php echo $data['project'];?>" aria-describedby="" name="project">
            </div>

            <div class="form-group">
                <label for="exampleInputcontent">article</label>
                <input type="text" class="form-control" required id="exampleInputArticle" value="<?php echo $data['article'];?>" name="article">
            </div>
            <div class="form-group">
                <label for="exampleInputcontent">granularity</label>
                <input type="text" class="form-control" required id="exampleInputcontent" value="<?php echo $data['granularity'];?>" name="granularity">
            </div>
            <div class="form-group">
                <label for="exampleInputcontent">timestamp</label>
                <input type="text" class="form-control" required id="exampleInputcontent" value="<?php echo $data['timestamp'];?>" name="timestamp">
            </div>
            <div class="form-group">
                <label for="exampleInputcontent">access</label>
                <input type="text" class="form-control" required id="exampleInputcontent" value="<?php echo $data['access'];?>" name="access">
            </div>
            <div class="form-group">
                <label for="exampleInputcontent">agent</label>
                <input type="text" class="form-control" required id="exampleInputcontent" value="<?php echo $data['agent'];?>" name="agent">
            </div>
            <div class="form-group">
                <label for="exampleInputcontent">views</label>
                <input type="number" class="form-control" required id="exampleInputcontent" value="<?php echo $data['views'];?>" name="views">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


</body>

</html>