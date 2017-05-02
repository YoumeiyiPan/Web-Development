<?php
   //print_r($_POST);
   require_once 'db.php';
   require_once 'function.php';


   $check = add_user($_POST['un'],$_POST['eml'],$_POST['pw']);

   if($check){
   	echo "yes";
   } else {
   	echo "no";

   }
?>