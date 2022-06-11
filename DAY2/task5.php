<?php

declare(strict_types=1);

function getTagID(string $tag)
{
  if(str_contains($tag ,'id'))
  {
    $pos=strpos($tag,'id=');
    $pos=$pos+3;
    for($i=$pos;$i<strlen($tag);$i++)
    {
        if($tag[$i]==">"||$tag[$i]==" ")
        {
            break;
        }
        else
        {
            echo $tag[$i];
        }
    }
  }
  else
  {
      echo false;
  }
}

getTagID('<div id="container">')

?>