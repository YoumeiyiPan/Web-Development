<?php
require_once '../php/db.php';
//print_r($_SESSION);

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> Miracle,Go! Homepage</title>
<meta name="description" content="Web Application Development Project">
<meta name="author" content="Youmeiyi Pan">

<meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--响应式设计用-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<link rel ="stylesheet" href="../css/style.css">

</head>

<body>
<?php include_once 'self_menu.php';?>

 <div class="main">
 <div class="container">
 <div class="row">
 <div class= "col-xs-12">

 <div class="alert alert-success" role="alert">Welcome to Miracle, Go!</div>
 </div>
</div>
</div>
</div>

<?php include_once 'footer.php';?>
</body>

</html>
