<?php
@session_start();

function get_publish_event()
{
	$datas =array();

	$sql = "SELECT * FROM `event` WHERE `publish` = 1";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) > 0)
		{
			while ($row = mysqli_fetch_assoc($query)){
				$datas[]=$row;
			}
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $datas;
}



function get_event($id)
{
	$result =null;

	$sql = "SELECT * FROM `event` WHERE `publish` = 1 AND `id`= {$id}";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) ==1)
		{
			$result =mysqli_fetch_assoc($query);
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}



function get_publish_activity()
{
	$datas =array();

	$sql = "SELECT * FROM `activity` WHERE `publish` = 1";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) > 0)
		{
			while ($row = mysqli_fetch_assoc($query)){
				$datas[]=$row;
			}
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $datas;
}


function get_activity($id)
{
	$result =null;

	$sql = "SELECT * FROM `activity` WHERE `publish` = 1 AND `id`= {$id}";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) ==1)
		{
			$result =mysqli_fetch_assoc($query);
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}


function check_has_username($username)
{
	$result =null;

	$sql = "SELECT * FROM `users` WHERE `username` ='{$username}' ";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) >=1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}

function add_user($username,$email,$password)
{
	$result =null;
    $password = md5($password);
	$sql = "INSERT INTO `users` (`username`,`email`,`password`) VALUE ('{$username}','{$email}','{$password}')";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}

function verify_user($username,$password)
{
	$result =null;
    $password=md5($password);
	$sql = "SELECT * FROM `users` WHERE `username` ='{$username}' AND `password`='{$password}'";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) >=1)
		{
			$user = mysqli_fetch_assoc($query);

			$_SESSION['is_login']=true;
			$_SESSION['login_user_id']=$user['id'];

			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
} 

function get_all_event()
{
	$datas =array();

	$sql = "SELECT * FROM `event`";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) > 0)
		{
			while ($row = mysqli_fetch_assoc($query)){
				$datas[]=$row;
			}
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $datas;
}

function add_event($title,$content,$publish)
{
	$result =null;
    $create_date= date("Y-m-d H:i:s");
    $create_user_id=$_SESSION['login_user_id'];
	$sql = "INSERT INTO `event` (`title`,`content`,`publish`,`create_date`,`create_user_id`) 
	        VALUE ('{$title}','{$content}',{$publish},'{$create_date}',{$create_user_id})";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}


function get_edit_event($id)
{
	$result =null;

	$sql = "SELECT * FROM `event` WHERE `id`= {$id}";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) ==1)
		{
			$result =mysqli_fetch_assoc($query);
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}




function update_event($id,$title,$content,$publish)
{
	$result =null;
    $modify_date= date("Y-m-d H:i:s");
    $create_user_id=$_SESSION['login_user_id'];
	$sql = "UPDATE `event` SET `title` = '{$title}',`content`='{$content}',`publish`=$publish,`modify_date`='{$modify_date}' WHERE `id`=$id";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}


function del_event($id)
{
	$result =null;
   
    
	$sql = "DELETE FROM `event`  WHERE `id`=$id";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}

function get_all_member()
{
	$datas =array();

	$sql = "SELECT * FROM `users`";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) > 0)
		{
			while ($row = mysqli_fetch_assoc($query)){
				$datas[]=$row;
			}
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $datas;
}


function del_member($id)
{
	$result =null;
   
    
	$sql = "DELETE FROM `users`  WHERE `id`=$id";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}


function get_edit_member($id)
{
	$result =null;

	$sql = "SELECT * FROM `users` WHERE `id`= {$id}";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) ==1)
		{
			$result =mysqli_fetch_assoc($query);
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}


function update_member($id,$username,$email,$password)
{
	$result =null;

	
    if($password!=''){
	$password=md5($password);
	$sql = "UPDATE `users` SET `username` = '{$username}',`email`='{$email}',`password`='{$password}' WHERE `id`=$id";
    } 

    else {
	$sql = "UPDATE `users` SET `username` = '{$username}',`email`='{$email}' WHERE `id`=$id";
    }
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}


function get_all_activity()
{
	$datas =array();

	$sql = "SELECT * FROM `activity`";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) > 0)
		{
			while ($row = mysqli_fetch_assoc($query)){
				$datas[]=$row;
			}
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $datas;
}


function add_activity($intro,$image_path,$video_path,$publish)
{
	$result =null;
    $upload_date= date("Y-m-d H:i:s");
    $create_user_id=$_SESSION['login_user_id'];

    $image_path_value="'{$image_path}'";
    if($image_path == ''){
    	$image_path_value= "NULL";
    }

    $video_path_value="'{$video_path}'";
    if($video_path == ''){
    	$video_path_value="NULL";
    }

	$sql = "INSERT INTO `activity` (`intro`,`image_path`,`video_path`,`publish`,`upload_date`,`create_user_id`) 
	        VALUE ('{$intro}',{$image_path_value},{$video_path_value},{$publish},'{$upload_date}',{$create_user_id})";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}


function get_edit_activity($id)
{
	$result =null;

	$sql = "SELECT * FROM `activity` WHERE  `id`= {$id}";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) ==1)
		{
			$result =mysqli_fetch_assoc($query);
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}



function update_activity($id,$intro,$image_path,$video_path,$publish)
{
	$result =null;
    $modify_date= date("Y-m-d H:i:s");
    
    $activity=get_edit_activity($id);

    //新与旧不一样，删旧
    if(file_exists("../".$activity['image_path']))
    {
       
       unlink("../".$activity['image_path']);
       
    }

     if(file_exists("../".$activity['video_path']))
    {
       
       unlink("../".$activity['video_path']);
       
    }
   // $create_user_id=$_SESSION['login_user_id'];
    $image_path_sql="`image_path`='{$image_path}',";
    if( $image_path==''){
    	  $image_path_sql='`image_path`=NULL,';
    }
    
     $video_path_sql="`video_path`='{$video_path}',";
    if( $video_path==''){
    	  $video_path_sql='`video_path`=NULL,';
    }
   
	$sql = "UPDATE `activity` SET `intro` = '{$intro}',{$image_path_sql} {$video_path_sql}
	`publish`=$publish,`modify_date`='{$modify_date}' WHERE `id`=$id";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}



function del_activity($id)
{
	$result =null;

    $activity=get_edit_activity($id);

    //新与旧不一样，删旧
    if(file_exists("../".$activity['image_path']))
    {
       
       unlink("../".$activity['image_path']);
       
    }

     if(file_exists("../".$activity['video_path']))
    {
       
       unlink("../".$activity['video_path']);
       
    }
     
	$sql = "DELETE FROM `activity`  WHERE `id`=$id";
    //echo $sql . "\n";
	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_affected_rows($_SESSION['link']) ==1)
		{
			$result =true;
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}




function get_username($id)
{
	$result =null;

	$sql = "SELECT * FROM `users` WHERE `id`= {$id}";

	$query = mysqli_query($_SESSION['link'], $sql);

	if($query)
	{
		//succuess
		if (mysqli_num_rows($query) ==1)
		{
			$result =mysqli_fetch_assoc($query);
			
		}
	}
	else 
	{
		//fail
		echo "{$sql} sql sytax wrong : <br/>" . mysqli_error($_SESSION['link']);
	}
 

    return $result;
}










?>