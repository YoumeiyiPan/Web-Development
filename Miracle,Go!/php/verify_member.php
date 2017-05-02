<?php
   //print_r($_POST);
   require_once 'db.php';
   require_once 'function.php';


   $check = verify_user($_POST['un'], $_POST['pw']);

   if($check){
   	echo "yes";
   } else {
   	echo "no";

   }
?>