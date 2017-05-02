<?php
require_once '../php/db.php';
require_once '../php/function.php';
//print_r($_SESSION);

if(!isset($_SESSION['is_login']) || !$_SESSION['is_login']){
    header("Location: login.php");

}

$datas = get_all_event();
//print_r($datas);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title> Miracle,Go!-backend-event list</title>
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
 <div class="row add_btn_area">
 <div class= "col-xs-12">

   <a href="event_add.php" class="btn btn-primary">New events </a>
 </div>
</div>
<div class ="row">
  <div class="col-xs-12">
  <table class="table table-hover">
     <tr>
       <th> Title</th>
       <th> Pubish or not?</th>
       <th> Publish date</th>
       <th> Operation</th>
     </tr>


<?php if(!empty($datas)):?>
  <?php foreach($datas as $a_datas):?>
     <tr>
        <td><?php echo $a_datas['title'];?></td>
       <td> <?php echo ($a_datas['publish'])?'publishing':'unpublish';?></td>
       <td> <?php echo $a_datas['create_date'];?></td>
       <td> 
          <a href="event_edit.php?i=<?php echo $a_datas['id'];?>" class="btn btn-success"> Edit</a>
          <a href="javascript:void(0);" class="btn btn-danger del_event" data-id="<?php echo $a_datas['id'];?>">Delete</a>

       </td>
     </tr>  
  <?php endforeach;?>

 <?php else:?>
     <tr>
        <td colspan="5">No events!</td>

     </tr>  

 <?php endif;?>
<!--

-->
  </table>
  </div>
  </div>
</div>
</div>

<?php include_once 'footer.php';?>

<script src = "https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
  $(document).ready(function(){

    $("a.del_event").on("click",function(){
//var c=confirm("Are you sure to delete?");
 this_tr= $(this).parent().parent();

//console.log(c);
//console.log($(this).attr("data-id"));

     $.ajax({
          type: "POST", 
          url: "../php/del_event.php",
          data: {'id':$(this).attr("data-id")
                },
          dataType:'html'
        }).done(function(data){
          
          if(data == "yes")
          {
              alert("Delete successfully! Click confirm to remove event.");
              this_tr.fadeOut();

          } 
          else
          {
            alert("Update fails!" + data);
            
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
