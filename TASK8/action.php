<?php

//clean function
function clean($input){
    $input = trim($input);
    $input = stripcslashes($input);
    $input = strip_tags($input);
    return $input
}

if($_SERVER['REQUEST_METHOD']){
  $name = clean($_POST['name']);
  $email = clean($_POST['email']);
  $password = clean($_POST['password']);
  $adress = clean($_POST['adress']);
  $gender = $_POST['gender'];
  $url = clean($_POST['url']);

  $errors = [];

  //vaidation form

  //name

  if(empty($name)){
      $errors['name'] = 'please enter your name';
  }
  else if(!ctype_alpha(str_replace(' ','',$name))){
      $error['name'] = 'letters only please';
  }

  //email

  if(empty($email)){
      $errors['email']= 'please  enter your email';
    }
  else{
   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
     echo $email.'<br>';
    }

    else{    
      $email=filter_var($email,FILTER_SANITIZE_EMAIL);

      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          echo "the email is invalid";
      }
      else{
          echo $email;
      }

    }
   }

 //password

 if(empty($password)){
       $errors['email']= 'please  enter a password';
   }

 if(strlen($password)<6){
        $errors['password']= 'password must be 6 characters or more';
    }

 //adress

 if (empty($address)){
       $errors['address']= 'please  enter your address';
   }

 if(strlen($address)<6){
        $errors['address']= 'the address must be 10 characters or more';
    }

 //gender

   if(empty($gender)){
        $errors['gender']= 'please choose a gender';
    }

 //url

 if(empty($url)){
       $errors['url']= 'please enter a url';
    } 

 if(parse_url($url)&&(!str_contains($url,'linkedin'))){
      $errors['url']= 'please enter a linkedin account';   
    } 

 //file
 
 if (!empty($_FILES['pdf']['name'])){

     $tempName  = $_FILES['pdf']['tmp_name'];
     $fileName = $_FILES['pdf']['name'];
     $fileType = $_FILES['pdf']['type'];

     $extensionArray = explode('/', $fileType);
     $extension =  strtolower( end($extensionArray));

     $allowedExtensions = ['pdf'];  

     if (in_array($extension, $allowedExtensions)){

         $finalName = uniqid() . time() . '.' . $extension;

         $disPath = 'uploads/' . $finalName;

         if (move_uploaded_file($tempName, $disPath)){
              
             echo 'file uploaded successfully';
         } 
         else{
             echo 'file uploaded failed';
         }
     } 
     else{
         echo 'file type not allowed pdf only';
     }
    } 
 else{
     echo 'please select file <br>';
    }
 if(count($errors)>0){

     foreach ($errors as $key => $value){
         echo $key.' : '.$value.'<br>';
        }
    }
}

?>