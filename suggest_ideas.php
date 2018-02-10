<?php
include('init.php');
if(!isset($_SESSION['id']))
{
    header("Location: ./index.php");
    exit();
}

include('universal_functions.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <title>Suggest Project Ideas</title>
      <?php include('./code_header.php'); ?>
      
      <script>
         function submit_idea()
         {
            console.log("Submitted idea...")
            $.post('./save_idea.php',
            {
               idea_title: $("#idea_title").val(),
               idea: $("#idea_contents").val()
            }, function(output)
            {
               if(output=="success")
                  $('#success_message').show();
               else
                  $('#error').html(output).show();
            });
         }
      </script>
   </head>
   <body>
      <?php include('./index_header.php'); ?>
      <div class="content" style="text-align:center;">
         <table style="margin:0 auto;">
            <tbody>
               <tr>
                  <td>
                     <img class="icon" src="./images/suggest.png" style="height:40px;"/>
                  </td>
                  <td>
                     <p>Suggest Project Ideas</p>
                  </td>
               </tr>
            </tbody>
         </table>
         
         <table style="width:500px;margin:0 auto;" >
            <tbody>
               <tr>
                  <td>
                     <input id="idea_title" placeholder="Idea title..." class="input" style="width:100%" maxlength="255"/>
                  </td>
               </tr>
               <tr>
                  <td>
                     <textarea id="idea_contents" placeholder="Idea..." class="input textarea" maxlength="10000"></textarea>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="button" class="button" value="Submit" onClick="submit_idea();" />
                  </td>
               </tr>
            </tbody>
         </table>
         <p id="success_message" style="display:none;color:green;">Successfully submitted!</p>
         <p class="error" id="error" style="display:none;color:red;">ERROR</p>
         
         
      </div>
      <?php include('./footer.php'); ?>
   </body>
</html>