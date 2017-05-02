<?php
require_once '../php/db.php';
//print_r($_SESSION);

if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
    header("Location: index.php");

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> Sign in</title>
<meta name="description" content="Web Development Project">
<meta name="author" content="Youmeiyi Pan">

<meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--响应式设计用-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<link rel ="stylesheet" href="../css/style.css">

</head>

<body>
<?php include_once 'menu.php';?>

 <div class="main">
 <div class="container">
 <div class="row">
 <div class="col-xs-3 col-md-2"></div>
 <div class= "col-xs-6 col-md-8 thumbnail">

 <form class="form-horizontal" id = "login_form" method="post" action="php/add_member.php">
  <div class="form-group">
    <label for="username" class="col-sm-4 control-label">Username </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name= "username" id="username" placeholder="Please enter your username" required>
    </div>
  </div>



  <div class="form-group">
    <label for="password" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" name= "password" id="password" placeholder="Please enter your password" required>
    </div>
  </div>


  


  <div class="form-group">
    <div class="col-xs-12 text-center">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>

  </div>

  
</form>
 </div>
</div>
 <div class="col-xs-12 text-center">
<p class="text-muted"><a href="../register.php">No account? Please click to <strong>Sign Up</strong>!</p></a>
    </div>
</div>
</div>

<?php include_once 'footer.php';?>
<script src = "https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
	$(document).ready(function(){
	
		//密码正确否？
	$("#login_form").on("submit", function(){

				$.ajax({
					type: "POST", 
					url: "../php/verify_member.php",
					data: {'un': $("#username").val(),
				           
				           'pw': $("#password").val()
				           },
					dataType:'html'
				}).done(function(data){
					
					if(data == "yes")
					{
					    
					    window.location.href="index.php";

					}
					else
					{
						alert("Log in fails, please check your username and password!");
						
					}
					//console.log(data);
				}).fail(function(jqXHR,textStatus,errorThrown){
					alert("somthing wrong, please see console log");
					console.log(jqXHR,responseText);
				});

			
			return false;
		});

	});

</script>

</body>

</html>