<?php

@session_start();
//设定资料库资讯
$host = 'localhost';
//以root管理者账号进入资料库
 $dbuser ='root';
//root 资料库密码
$dbpw='';
//登入后用的资料库
$dbname = 'my_db';

$_SESSION['link']=mysqli_connect($host, $dbuser, $dbpw, $dbname);

if($_SESSION['link'])
{
	mysqli_query($_SESSION['link'],"SET NAMES utf8");
	//cho 'OK';
}
else
{
	echo 'CAN NOT CONNECTE TO MYSQL DATABASE :<br/>' . mysqli_connect_error();
}
?>
