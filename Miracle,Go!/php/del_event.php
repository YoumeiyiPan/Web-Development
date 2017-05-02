<?php
   //print_r($_POST);
   require_once 'db.php';
   require_once 'function.php';


   $check = del_event($_POST['id']);

   if($check){
   	echo "yes";
   } else {
   	echo "no";

   }
   
?>