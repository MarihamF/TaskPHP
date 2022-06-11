<?php
function single_arr()
{
    $dim_arr=[
   0 => [0=>'a', 1=>'b' ,2=>'c'] ,
   1 => [0=>'x' , 1=>'b' , 2=>'a'],
   2 => [0=>'z' , 1=>'z' , 2=>'v']
 ];
 $sing_arr=[];
 $new_arr=[];
 foreach($dim_arr as $key=>$value){

   foreach($value as $key1=>$value1){
        
    array_push($sing_arr,$value1);
    }
   };
   foreach($sing_arr as $oldvalue){

   foreach($new_arr as $newvalue){

    if($oldvalue==$newvalue){
       
     continue 2;
     }
   }
   array_push($new_arr,$oldvalue);
}
   print_r($new_arr);  
}

single_arr();
?>