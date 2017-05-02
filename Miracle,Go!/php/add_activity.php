<?php
   //print_r($_POST);
   require_once 'db.php';
   require_once 'function.php';


   $check = add_activity($_POST['intro'],$_POST['image_path'],$_POST['video_path'],$_POST['publish']);

   if($check){
   	echo "yes";
   } else {
   	echo "no";

   }
?>