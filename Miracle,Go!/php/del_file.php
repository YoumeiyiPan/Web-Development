<?php


if (file_exists("../" . $_POST['file']))
{
  if(unlink("../" . $_POST['file'])){
  	echo  "yes";
  }
  else {
  	echo "no delete";
  }

}
 else{
 	echo ("No file!");
 }
?>