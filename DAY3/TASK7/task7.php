<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $name=$_GET['name'];
    $email=$_GET['email'];
    $url=$_GET['url'];
    $errors=[];
    if(empty($name)){
        
        $errors['name']="the name is required";
    }

    if(strlen($name)<3||strlen($name)>20){

        $errors['name']="you must enter at least 3 letters";
    }

    if(strlen($name)>20){

        $errors['name']="you must enter at most 20 letters";
    }

    if(!ctype_alpha($name)){

        $errors['name']="you must enter letters only";
    }

    if(empty($email)){

        $errors['email']="the email is required";
    }

    if(empty($url)){
         $errors['url']="the url is required";
    }

  // if(parse_url($url)){
  //     $errors['url']="please enter valid linkedin account";
  // }

    if(count($errors) > 0){

        foreach ($errors as $key => $value) {
            echo $key.' : '.$value.'<br>';
        }
    }
    else{
           echo 'Success';
    }

}
?>