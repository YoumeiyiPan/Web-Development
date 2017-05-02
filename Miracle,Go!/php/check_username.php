<?php
   //print_r($_POST);
   require_once 'db.php';
   require_once 'function.php';


   $check = check_has_username($_POST['n']);

   if($check){
   	echo "yes";
   } else {
   	echo "no";

   }
?>