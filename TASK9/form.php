<?php

function clean($input){
    
    $input = trim($input); 
    $input = stripslashes($input); 
    $input = strip_tags($input); 
    return $input;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title     = clean($_POST['title']);
    $content    = clean($_POST['content']);

    $errors=[];

    //title

    if(empty($title)){
        $errors['title']="please enter a title";
    }
    if(!ctype_alpha(str_replace(' ', '', $title))){
        $errors['title']="please enter letters only";
    }

    //content

    if(empty($content)){
      $errors['content']="please enter a content";
    }
    if(strlen($content)<50){
      $errors['content']="you should enter at least 30 characters";
    }

    //file 
    if (!empty($_FILES['image']['name'])){

        $tempName  = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileType = $_FILES['image']['type'];

        $extensionArray = explode('/', $fileType);
        $extension =  strtolower( end($extensionArray));

        $allowedExtensions = ['jpg' , 'jpeg' , 'jfif' , 'pjpeg' , 'pjp'];  

        if (in_array($extension, $allowedExtensions)){

            $finalName = uniqid() . time() . '.' . $extension;

            $disPath = 'upload/' . $finalName;

            if (move_uploaded_file($tempName, $disPath)){
                 
                echo 'File Uploaded Successfully';
            } 
            else{
                echo 'File Uploaded Failed';
            }
        } 
        else{
            echo 'File Type Not Allowed';
        }
    } 
    else{
        echo 'Please Select File <br>';
    }
    if(count($errors) > 0){

        foreach ($errors as $key => $value){
            echo $key.' : '.$value.'<br>';
        }
    }
    $file=fopen('blogs.txt','a') or die('unable to open file');
    $id=time().rand(1,3000);
    $blog=$id.'||'.$title.'||'.$content."\n";
    fwrite($file,$blog);

    fclose($file);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">

        <form  method="post" enctype="multipart/form-data" action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="form-group">
                <label for="exampleInputTitle">title</label>
                <input type="text" class="form-control"   name="title"  id="exampleInputTitle"  placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="exampleInputContent">content</label>
                <input type="text" class="form-control" name="content"  id="exampleInputContent"  placeholder="Enter content">
            </div>

            <div class="form-group">
                <label for="exampleInputImage">image</label>
                <input type="file" class="form-control" name="image"  id="exampleInputImage"  placeholder="Enter image">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
</div>
</body>
</html>