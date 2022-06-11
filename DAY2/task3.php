<?php

 $letter = 'a';

 $next_letter = ++$letter; 

 if (strlen($next_letter) > 1) 

 {
  $next_letter = $next_letter[0];
  }

 echo $next_letter."\n";
?>