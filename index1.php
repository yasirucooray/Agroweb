<!--
//index.php
!-->

<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['username']))
{
 header("location:login.php");
}

?>

<html>  
    <head>  
        <title>AgroWeb</title>  
        <link rel="shortcut icon" type="images/png" href="images/local3.png">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<style type="text/css">
    *{padding:0;margin:0;}

body{
  font-family:Verdana, Geneva, sans-serif;
  font-size:18px;
 background-color:	#708090;
  background-repeat:no-repeat;
  background-size:cover;
  
  opacity: 4;

}

.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#0C9;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  box-shadow: 2px 2px 3px #999;
}

.my-float{
  margin-top:22px;
}
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

    </head>  
    <body>

       </div>
       
        <div class="container">
   <br>
   <a  href="index.html"><img src="images/new2.png" class="center" style="position:relative; left:380;" width="380" height="150"></a>
   <h1 align="center"-><b>Welcome To AgroWeb Online Chat</b></h1><br >
   <h3 align="center">Plantation and industry collaboration Web Application</a></h3>
  <h3 align="center">A place to help others</a></h3><br >
   <div class="row">
    <div class="col-md-8 col-sm-6">
     <a href="index.php" style="color:orange;" class="nav-link">Back to Web</a>
    </div>
    <div class="col-md-2 col-sm-3">
     <input type="hidden" id="is_active_group_chat_window" value="no" />
     <button type="button" name="group_chat" id="group_chat" class="btn btn-warning btn-xs">Group Chat</button>
    </div>
    <div class="col-md-2 col-sm-3">
     <p align="right">Welcome <?php echo $_SESSION['username']; ?>  <a href="logout.php"><b style="color:RED;">Logout</b></a></p>
    </div>
   </div>
   <div class="table-responsive">
   <h4><b>Registered Users</b></h4>
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
  </div>
    </body>  
</html>

<style>

.chat_message_area
{
 position: relative;
 width: 100%;
 height: auto;
 background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
 width: 100%;
 height: auto;
 min-height: 80px;
 overflow: auto;
 padding:6px 24px 6px 12px;
}

.image_upload
{
 position: absolute;
 top:3px;
 right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>  

<div id="group_chat_dialog" style="background-color: gray;" title="Group Chat Section">
 <div id="group_chat_history" style="height:350px; color:white;   background-image:url(images/web.jpg); background-repeat:no-repeat;background-size:cover; border:1px solid #ccc; overflow-y: auto; margin-bottom:24px; padding:16px;">

 </div>
 <div class="form-group">
  <!--<textarea name="group_chat_message" id="group_chat_message" class="form-control"></textarea>!-->
  <div class="chat_message_area" >
   <div id="group_chat_message" contenteditable class="form-control">

   </div>
   <div class="image_upload">
    <form id="uploadImage" method="post" action="upload.php">
     <label for="uploadFile"><img src="images/iccc.png" /></label>
     <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
    </form>
   </div>
  </div>
 </div>
 <div class="form-group" align="right">
  <button type="button" name="send_group_chat" id="send_group_chat" class="btn btn-info">Send</button>
 </div>
</div>


<script>  
$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
  fetch_group_chat_history();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div style=" background-color: gray; " id="user_dialog_'+to_user_id+'" class="user_dialog" title="chat with '+to_user_name+'">';
  modal_content += '<div style="height:350px; color:white;   background-image:url(images/web.jpg); background-repeat:no-repeat;background-size:cover; border:1px solid #ccc; overflow-y: auto; margin-bottom:4px; padding:12px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea placeholder="Type a message" name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
  $('#chat_message_'+to_user_id).emojioneArea({
   pickerPosition:"top",
   toneStyle: "bullet"
  });
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    //$('#chat_message_'+to_user_id).val('');
    var element = $('#chat_message_'+to_user_id).emojioneArea();
    element[0].emojioneArea.setText('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
  $('#is_active_group_chat_window').val('no');
 });

 $(document).on('focus', '.chat_message', function(){
  var is_type = 'yes';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message', function(){
  var is_type = 'no';
  $.ajax({
   url:"update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type},
   success:function()
   {
    
   }
  })
 });

 $('#group_chat_dialog').dialog({
  autoOpen:false,
  width:400
 });

 $('#group_chat').click(function(){
  $('#group_chat_dialog').dialog('open');
  $('#is_active_group_chat_window').val('yes');
  fetch_group_chat_history();
 });

 $('#send_group_chat').click(function(){
  var chat_message = $('#group_chat_message').html();
  var action = 'insert_data';
  if(chat_message != '')
  {
   $.ajax({
    url:"group_chat.php",
    method:"POST",
    data:{chat_message:chat_message, action:action},
    success:function(data){
     $('#group_chat_message').html('');
     $('#group_chat_history').html(data);
    }
   })
  }
 });

 function fetch_group_chat_history()
 {
  var group_chat_dialog_active = $('#is_active_group_chat_window').val();
  var action = "fetch_data";
  if(group_chat_dialog_active == 'yes')
  {
   $.ajax({
    url:"group_chat.php",
    method:"POST",
    data:{action:action},
    success:function(data)
    {
     $('#group_chat_history').html(data);
    }
   })
  }
 }

 $('#uploadFile').on('change', function(){
  $('#uploadImage').ajaxSubmit({
   target: "#group_chat_message",
   resetForm: true
  });
 });

 $(document).on('click', '.remove_chat', function(){
  var chat_message_id = $(this).attr('id');
  if(confirm("Are you sure you want to delete this message?"))
  {
   $.ajax({
    url:"remove_chat.php",
    method:"POST",
    data:{chat_message_id:chat_message_id},
    success:function(data)
    {
     update_chat_history_data();
    }
   })
  }
 });
 
});  
</script>
