<?php 
require_once 'php/db.php';
require_once 'php/function.php';
$datas = get_publish_event();
//print_r($datas);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> Events</title>
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

 <?php if(!empty($datas)):?>
  <?php foreach($datas as $event):?>
      <?
      $abstract= strip_tags($event['content']);
      $abstract= mb_substr($abstract, 0, 100, "utf-8");


      ?>
      <div class="panel panel-primary">
  <div class="panel-heading">
  <a href='event.php?i=<?php echo $event['id'];?>'><?php echo $event['title']?></div>
  <div class="panel-body">
    <p>
       
       <span class="label label-danger"><?php echo $event['create_date'];?> </span>
    </p>
    
    <?php echo $abstract . " ...MORE";?>
  </div>
</div>
 
<?php endforeach;?>
 <?php endif;?>
 </div>
</div>
</div>
</div>

<?php include_once 'footer.php';?>
</body>

</html>




