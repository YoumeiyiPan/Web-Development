<?php 
require_once 'php/db.php';
require_once 'php/function.php';
$activity= get_activity($_GET['i']);
$site_title = strip_tags($activity['intro']);
$site_title = mb_substr($site_title , 0, 10, "UTF-8") . "...";
//print_r($datas);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> <?php echo $site_title ;?></title>
<meta name="description" content="Web Development Project">
<meta name="author" content="Youmeiyi Pan">

<meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--响应式设计用-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<link rel ="stylesheet" href="css/style.css">

</head>

<body>
 <?php include_once 'menu.php';?>
<div class="main">
  <div class="container">
    <div class="row">
      <div class= "col-xs-12">
<?php if($activity['image_path']):?>
  <img src="<?php echo $activity['image_path'];?>" class="img-responsive"> 
<?php else:?>
  <div class="embed-responsive embed-responsive-16by9">
  <video src="<?php echo $activity['video_path'];?>" controls></video>
</div>
  
<?php endif;?>

      <div class="caption">        
        <?php echo $activity['intro'];?>
       
      </div>
      
  
      </div>
    </div>
  </div>
</div>

<?php include_once 'footer.php';?>
</body>

</html>




