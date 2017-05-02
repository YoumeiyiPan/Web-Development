<?php 
require_once 'php/db.php';
require_once 'php/function.php';
$datas = get_publish_activity();
//print_r($datas);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> Activity show</title>
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
 <div class="container-fluid">
 <div class="row">
 

 <?php if(!empty($datas)):?>
  <?php foreach($datas as $an_activity):?>
    <div class= "col-xs-12 col-sm-4">
       <div class="thumbnail">
<?php if($an_activity['image_path']):?>
  <img src="<?php echo $an_activity['image_path'];?>" class="img-responsive">
<?php else:?>
  <div class="embed-responsive embed-responsive-16by9">
  <video src="<?php echo $an_activity['video_path'];?>" controls></video>
</div>
  
<?php endif;?>

      <div class="caption">        
        <?php echo $an_activity['intro'];?>
        <p><a href="activity.php?i=<?php echo $an_activity['id'];?>" class="btn btn-primary" role="button">Play</a> </p>
      </div>
    </div>

    </div>
      
<?php endforeach;?>

<?else: ?>
<h1> No activity can show!</h1>
 <?php endif;?>
 </div>
</div>
</div>


<?php include_once 'footer.php';?>
</body>

</html>




