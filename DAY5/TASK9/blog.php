<?php
$file=fopen('blogs.txt','r') or die('unable to open file');
function deleteRecord()
{

$fc=file("blogs.txt"); 
echo($fc[0]);
$f=fopen("blogs.txt","w");


foreach($fc as $key=>$line)
{
      if (!strstr($line,$key)) 
         {
             fputs($f,$line);
          } 
}
fclose($f);
}
while(!feof($file))
{
    echo fgets($file);
   echo "<form method=get><button type=sumbit name=delete class=btn-primary>Delete</button></form>" ;
}

if(array_key_exists('delete', $_GET))
{
    deleteRecord();
}
fclose($file);

?>