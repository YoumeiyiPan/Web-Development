<?php
require_once '../php/db.php';
require_once '../php/function.php';
//print_r($_SESSION);

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");

}

$data = get_edit_event($_GET['i']);
//print_r($datas);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> Miracle,Go!-backend-Event Edit</title>
<meta name="description" content="Web Application Development Project">
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
 <input type="hidden" id="id" value="<?php echo $data['id'];?>">
<form id="event">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Please enter the title" value="<?php echo $data['title'];?>">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea id="content" class="form-control" rows="10"><?php echo $data['content'];?></textarea>
  </div>

  <div class="form-group">
    <label class="radio-inline">
    <input type="radio" name="publish"  value ="1" <?php echo ($data['publish']=="1")?'checked':'';?>> Publish
    </label>

        <label class="radio-inline">
    <input type="radio" name="publish"  value ="0" <?php echo ($data['publish']=="0")?'checked':'';?>> Not publish
    </label>
  </div>


  <button type="submit" class="btn btn-default">OK</button>
</form>

  </div>
  </div>
</div>
</div>

<?php include_once 'footer.php';?>

<script src = "https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
  $(document).ready(function(){
     
    //密码正确否？
  $("#event").on("submit", function(){


if($("#title").val()=='' || $("#content").val()==''){
   alert("Please enter the title or content!");
} 
else {
   $.ajax({
          type: "POST", 
          url: "../php/update_event.php",
          data: {'id': $("#id").val(),
                   'title': $("#title").val(),
                  'content': $("#content").val(),
                  'publish': $("input[name='publish']:checked").val()
                   },
          dataType:'html'
        }).done(function(data){
          
          if(data == "yes")
          {
              alert("Update successfully! Click to retrun to Event List page.");
              window.location.href="event_list.php";

          } 
          else
          {
            alert("Update fails!");
            
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
