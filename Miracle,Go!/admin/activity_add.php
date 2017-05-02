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

<title> Miracle,Go!-backend-New Activity</title>
<meta name="description" content="Web Development Project">
<meta name="author" content="Youmeiyi Pan">

<meta name="viewport" content="width=device-width, initial-scale=1.0">  <!--响应式设计用-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" --> 

<link rel ="stylesheet" href="../css/style.css">

</head>

<body>
<?php include_once 'menu.php'; ?>

 <div class="main">
 <div class="container">

<div class ="row">
  <div class="col-xs-12">
 <h2> New Activity</h2>
<form id="activity">
  <div class="form-group">
    <label for="intro">Introduction</label>
    <textarea id="intro" class="form-control" rows="10"></textarea>
  </div>

  <div class="form-group">
    <label for="content">Image Upload</label>
     <input type="file" class="image" accept="image/gif, image/jpeg, image/png">
     <input type ="hidden" id = "image_path" value="">
    <div class ='show_image'></div>
    <a href='javascript:void(0);' class="del_image btn btn-default">Delete</a>
  </div>

  <div class="form-group">
    <label for="content">Video Upload</label>
     <input type="file" class="video" accept="video/mp4">
     <input type ="hidden" id = "video_path" value="">
    <div class ='show_video'></div>
    <a href='javascript:void(0);' class="del_video btn btn-default">Delete</a>
    
  </div>

  <div class="form-group">
    <label class="radio-inline">
    <input type="radio" name="publish"  value ="1" checked> Publish
    </label>

        <label class="radio-inline">
    <input type="radio" name="publish"  value ="0"> Not publish
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
     
     //once image is chosen, autoupload
    $("input.image").on("change",function(){

      var save_path="files/images/",
          form_data = new FormData(),
          file_data= $(this)[0].files[0];

    //$("div.image").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');


    form_data.append("file",file_data);
    form_data.append("save_path",save_path);
    //console.log(form_data);
    $.ajax({
      type: 'POST',
      url: '../php/upload_file.php',
      data: form_data,
      cache: false,
      processData: false,
      contentType:false,
      dataType: 'html'
    }).done(function(data){

       //console.log(data);
       if(data=="yes"){

        $("div.show_image").html("<img src ='../" + save_path + file_data['name'] +"'>");
        $("#image_path").val(save_path + file_data['name']);
        } else {
              //警告回傳的訊息
            alert(data);        
       }
    }).fail(function(jqXHR,textStatus,errorThrown){
      alert("Errors, please see console log");
      console.log(jqXHR,responseText);
    });
 //console.log($(this)[0].files[0]);
    });


  
    //image delete

    $("a.del_image").on("click",function(){

      if($("#image_path").val()!=''){
          var c= confirm("Are you sure to delete? This action is can not be undo!");
      if(c){
       $.ajax({
      type: 'POST',
      url: '../php/del_file.php',
      data: {
        'file': $("#image_path").val()
      },
     
      dataType: 'html'
    }).done(function(data){

       //console.log(data);
       if(data=="yes"){
        
        $("div.show_image").html("");
        $("#image_path").val('');
        $("input.image").val('');
             
       }
    }).fail(function(jqXHR,textStatus,errorThrown){
      alert("Errors, please see console log");
      console.log(jqXHR,responseText);
    }); 

      }
      else {
        alert("Not upload yet, can not delete!");

      }

    
      }

    });
     //once video is chosen, autoupload
         $("input.video").on("change",function(){

      var save_path="files/videos/",
          form_data = new FormData(),
          file_data= $(this)[0].files[0];

    //$("div.image").html('<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>');


    form_data.append("file",file_data);
    form_data.append("save_path",save_path);
    //console.log(form_data);
    $.ajax({
      type: 'POST',
      url: '../php/upload_file.php',
      data: form_data,
      cache: false,
      processData: false,
      contentType:false,
      dataType: 'html'
    }).done(function(data){

       //console.log(data); 
       if(data=="yes"){

        $("div.show_video").html("<video src ='../" + save_path + file_data['name'] +"' controls >");
        $("#video_path").val(save_path + file_data['name']);
        } else {
              //警告回傳的訊息
            alert(data);        
       }
    }).fail(function(jqXHR,textStatus,errorThrown){
      alert("Errors, please see console log");
      console.log(jqXHR,responseText);
    });
 //console.log($(this)[0].files[0]);
    });
    
    //video delete

    $("a.del_video").on("click",function(){

      if($("#video_path").val()!=''){
          var c= confirm("Are you sure to delete? This action is can not be undo!");
      if(c){
       $.ajax({
      type: 'POST',
      url: '../php/del_file.php',
      data: {
        'file': $("#video_path").val()
      },
     
      dataType: 'html'
    }).done(function(data){

       //console.log(data);
       if(data=="yes"){
        
        $("div.show_video").html("");
        $("#video_path").val('');
        $("input.video").val('');
             
       }
    }).fail(function(jqXHR,textStatus,errorThrown){
      alert("Errors, please see console log");
      console.log(jqXHR,responseText);
    }); 

      }
      else {
        alert("Not upload yet, can not delete!");

      }

    
      }

    });


    //

  $("#activity").on("submit", function(){


if($("#intro").val()==''){
   alert("Please fill in the introduction!");
} 
else {
   $.ajax({
          type: "POST", 
          url: "../php/add_activity.php",
          data: {'intro': $("#intro").val(),
                   'image_path': $("#image_path").val(),
                  'video_path': $("#video_path").val(),
                  'publish': $("input[name='publish']:checked").val()
                   },
          dataType:'html'
        }).done(function(data){
          
          if(data == "yes")
          {
              alert("Add successfully! Click to retrun to Activicity List page.");
              window.location.href="activity_list.php";

          }
          else
          {
            alert("Add fails!"+data);
            
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
