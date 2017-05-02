<?php
require_once '../php/db.php';
require_once '../php/function.php';
//print_r($_SESSION);

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");

}

//$datas = get_all_event();
//print_r($datas);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> Miracle,Go!-backend-Member Add</title>
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

<div class ="row">
  <div class="col-xs-12">
 
<form class="form-horizontal" id = "register_form">
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name= "username" id="username" placeholder="Please enter your username" required>
    </div>
  </div>

 <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" name= "email" id="email" placeholder="Please enter your email address" required>
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" name= "password" id="password" placeholder="Please enter your password" required>
    </div>
  </div>

    <div class="form-group">
    <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="confirm_password" placeholder="Please enter your password again" required>
    </div>
  </div>
  


  <div class="form-group">
    <div class="col-xs-12 text-center">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
</form>
  </div>
  </div>
</div>
</div>

<?php include_once 'footer.php';?>

<script src = "https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
  $(document).ready(function(){
     

    $("#username").on("keyup",function(){
      if($(this).val()!= ''){
        //非空
        $.ajax({
          type: "POST", 
          url: "../php/check_username.php",
          data: {'n': $(this).val()},
          dataType: 'html'
        }).done(function(data){
          if(data == "yes")
          {

            //can not register, box change into red, show 'cancel' button
            $("#username").parent().parent().removeClass('has-success').addClass('has-error');
            //$("#register_form button[type='submit']").addClass('disabled');
            $("#register_form button[type='submit']").attr('disabled',true);


          }
          else
          {
            //can register, box change into green, no 'cancel' button 
            $("#username").parent().parent().removeClass('has-error').addClass('has-success');
            $("#register_form button[type='submit']").attr('disabled',false);
          }
          console.log(data);
        }).fail(function(jqXHR,textStatus,errorThrown){
          alert("somthing wrong, please see console log");
          console.log(jqXHR,responseText);
        });
        
      } else{
        $("#username").parent().parent().removeClass('has-success').removeClass('has-error');
        $("#register_form button[type='submit']").attr('disabled',false);

      }
      //$(this).val();
      //console.log("ttt");
    });
    //密码正确否？
  $("#register_form").on("submit", function(){
         
/*      alert("Your passwords don't match, please try again!");
        return false;
*/
        //password wrong
      if($("#password").val()!= $("#confirm_password").val()){

        $("#password").parent().parent().addClass('has-error');
        $("#confirm_password").parent().parent().addClass('has-error');




        alert("Your passwords don't match, please try again!");
        

      }
      else
      {
        //password right
        $.ajax({
          type: "POST", 
          url: "../php/add_member.php",
          data: {'un': $("#username").val(),
                   'eml': $("#email").val(),
                   'pw': $("#password").val()
                   },
          dataType:'html'
        }).done(function(data){
          console.log(data);
          if(data == "yes")
          {
              alert("Successfully adding a new member, enter OK to change into MEMBER LIST page!");
              window.location.href="member_list.php";

          }
          else
          {
            alert("Adding member fails!");
            
          }
          //console.log(data);
        }).fail(function(jqXHR,textStatus,errorThrown){
          alert("somthing wrong, please see console log");
          console.log(jqXHR,responseText);
        });


}
       
      
      return false;
    });

  });

</script>



</body>

</html>
