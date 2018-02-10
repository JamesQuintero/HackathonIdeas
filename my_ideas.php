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
      <title>My Project Ideas</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
      <?php include('./code_header.php'); ?>
      <script>
         function load_list()
         {
            $.post('./load_my_ideas.php',
            {
               
            }, function(output)
            {
        
               idea_ids=output.idea_ids;
               idea_titles=output.idea_titles;
               idea_contents=output.idea_contents;
               upvotes=output.upvotes;
               downvotes=output.downvotes;
                
                
                //gets the necessary html ready
                var html="";
                for(var x = 0; x < idea_ids.length; x++)
                {
                    var to_add="<tr><td valign='top'><p>"+x+")</p></td><td><table style='width:100%;border-top:1px solid gray;'><tbody><tr><td colspan='3'><p>"+idea_titles[x]+"</p></td></tr><tr><td colspan='3'><p>"+idea_contents[x]+"</p></td></tr><tr><td colspan='2'><button class='upvote' onclick='up("+idea_ids[x]+");' style='float:left;' id='button_up_"+idea_ids[x]+"'><span class='vote_count' id='idea_"+idea_ids[x]+"_upvote' data-count="+upvotes[x]+">"+upvotes[x]+"</span><i class='fa fa-thumbs-o-up'></i></button><button onclick='down("+idea_ids[x]+");' class='downvote' style='float:left;' id='button_down_"+idea_ids[x]+"'><span class='vote_count' id='idea_"+idea_ids[x]+"_downvote' data-count="+downvotes[x]+">"+downvotes[x]+"</span><i class='fa fa-thumbs-o-down'></i></button></td></tr></tbody></table></td></tr>";
                    
                    html+=to_add;
                }
                $('#table_body').html(html);
            }, "json");
         }
         
         function up(idea_id)
         {
            $.post("./like.php",
            {
               idea_id: idea_id
            }, function(output)
            {
               
               var new_vote_count=$("#idea_"+idea_id+"_upvote").data('count')+1;
               $('#idea_'+idea_id+"_upvote").html(new_vote_count);
               console.log(output);
               $('#button_up_'+idea_id).attr('onClick', "");
            });
         }
         
         function down(idea_id)
         {
            $.post("./dislike.php",
            {
               idea_id: idea_id
            }, function(output)
            {
               var new_vote_count=$("#idea_"+idea_id+"_downvote").data('count')+1;
               $('#idea_'+idea_id+"_downvote").html(new_vote_count);
               console.log(output);
               $('#button_down_'+idea_id).attr('onClick', "");
            });
         }
         
         $(document).ready(function()
         {
            load_list();
            console.log("Got to the end");
         });
      </script>
   </head>
   <body>
      <?php include('./index_header.php'); ?>
      <div class="content">
         <table style="margin:0 auto;padding-bottom:20px;">
            <tbody>
               <tr>
                  <td>
                     <img class="icon" src="./images/my_ideas.png" style="height:60px;"/>
                  </td>
                  <td>
                     <p style="font-size:20px;text-align:center;">My Ideas</p>
                  </td>
               </tr>
               
            </tbody>
         </table>
         <table>
            <tbody id="table_body">
               
            </tbody>
         </table>
      </div>
      <?php include('./footer.php'); ?>
   </body>
</html>