<?php
$file_path=$_SERVER['PHP_SELF'];  //get current path
$file_name=basename($file_path,".php"); // basename: 取档名， 第二个参数是需要去掉的 
switch ($file_name) {
	case 'event_list':
		$page_index = 1;
		break;
	case 'event':
		$page_index = 1;
		break;		
	case 'activity_list':
		$page_index = 2;
		break;
	case 'activity':
		$page_index = 2;
		break;		
	case 'about':
		$page_index = 3;
		break;
	case 'register':
		//case 'signin':
		$page_index = 4;
		break;				
	default:
		$page_index = 0;
		break;
}



?>
 <div class="top">
 <div class="jumbotron"> <!--上面变灰色--> 
     <div class ="container">
     <div class="row">
     <div class="col-xs-12">
     
     <h1 class="text-center">Miracle, Go!</h1>

<ul class="nav nav-pills">



  <li role="presentation" <?php echo ($page_index ==0)?"class='active'":"";?>><a href="./">Home</a></li>
  <li role="presentation" <?php echo ($page_index ==1)? "class='active'":"";?>><a href="event_list.php">Events</a></li>
  <li role="presentation" <?php echo ($page_index ==2)? "class='active'":"";?>><a href="activity_list.php">Activity show</a></li>
  <li role="presentation" <?php echo ($page_index ==3)? "class='active'":"";?>><a href="about.php">About me</a></li>
  <li role="presentation" <?php echo ($page_index ==4)? "class='active'":"";?>><a href="admin/signin.php">Sign in / Sign up</a></li>
  <!--li role="presentation" <!-?php echo ($page_index ==4)? "class='active'":"";?>><a href="register.php">Sign in/ Sign up</a></li-->
</ul>
</div>
</div>
</div>
</div>
</div>