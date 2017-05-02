<?php
$file_path=$_SERVER['PHP_SELF'];  //get current path
$file_name=basename($file_path,".php"); // basename: 取档名， 第二个参数是需要去掉的 
switch ($file_name) {
	case 'event_list':
	case 'event_edit':
	case 'event_add':
		$page_index = 1;
		break;

	case 'activity_list':
	case 'activity_edit':
	case 'activity_add':
		$page_index = 2;
		break;
	
	case 'member_list':
	case 'member_edit':
	case 'member_add':
		$page_index = 3;
		break;
	case 'logout':
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


<li role="presentation"> <a href="../">Front Home</a></li>
  <li role="presentation" <?php echo ($page_index ==0)?"class='active'":"";?>><a href="./">Backend Home</a></li>
  <li role="presentation" <?php echo ($page_index ==1)? "class='active'":"";?>><a href="event_list.php">Events</a></li>
  <li role="presentation" <?php echo ($page_index ==2)? "class='active'":"";?>><a href="activity_list.php">Activity show</a></li>
  <li role="presentation" <?php echo ($page_index ==3)? "class='active'":"";?>><a href="member_list.php">All member</a></li>
  <li role="presentation" ><?php echo ($page_index ==4)? "class='active'":"";?><a href="../php/logout.php">Log out</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>