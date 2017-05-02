<?php
   //print_r($_POST);
   require_once 'db.php';
   require_once 'function.php';


   $check = add_event($_POST['title'],$_POST['content'],$_POST['publish']);

   if($check){
   	echo "yes";
   } else {
   	echo "no";

   }
?>