<?php
   //print_r($_POST);
   require_once 'db.php';
   require_once 'function.php';


   $check = update_event($_POST['id'],$_POST['title'],$_POST['content'],$_POST['publish']);

   if($check){
   	echo "yes";
   } else {
   	echo "no";

   }
?>