<?php
//echo "<hr>";
//print_r($_POST);
if(file_exists($_FILES['file']['tmp_name']))
{
	$target_folder=$_POST['save_path'];

	$file_name =$_FILES['file']['name'];


	if(move_uploaded_file($_FILES['file']['tmp_name'], "../" . $target_folder . $file_name))
	{
		echo "yes";
	}
	else{
		echo "Save fails, please make sure file folder {$_POST['save_path']} can be written";
	}

	//$_POST["image_path"] = $target_folder  . $file_name;
}

else 
{
	echo "cache not exist, upload fails!";
}


?>