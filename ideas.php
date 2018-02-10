<?php
@include("init.php");
include("login_checks.php");
include("universal_functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <title>Project Ideas</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
      <?php include('./code_header.php'); ?>
      <script>
         function load_list()
         {
            console.log($('#sort_select').val())
            $.post('./load_ideas.php',
            {
               sort: $('#sort_select').val()
            }, function(output)
            {
               console.log(output)
               idea_ids=output.idea_ids;
               idea_titles=output.idea_titles;
               idea_contents=output.idea_contents;
               upvotes=output.upvotes;
               downvotes=output.downvotes;
                
                
//                //gets the necessary html ready
//                var html="";
//                for(var x = 0; x < idea_ids.length; x++)
//                {
//                    var to_add="<tr><td>    <table><tbody><tr><td colspan='3'>"+idea_titles[x]+"</td></tr><tr><td>"+idea_contents[x]+"</td><td>"+upvotes[x]+"</td><td>"+downvotes[x]+"</td></tr></tbody></table>    </td></tr>";
//                    
//                    html+=to_add;
//                }
                 //gets the necessary html ready
                var html="";
                for(var x = 0; x < idea_ids.length; x++)
                {
                    var to_add="<tr><td valign='top'><p>"+x+")</p></td><td><table style='width:100%;border-top:1px solid gray;'><tbody><tr><td colspan='3'><p class='idea_title'>"+idea_titles[x]+"</p></td></tr><tr><td colspan='3'><p>"+idea_contents[x]+"</p></td></tr><tr><td colspan='2'><button class='upvote' onclick='up("+idea_ids[x]+");' style='float:left;' id='button_up_"+idea_ids[x]+"'><span class='vote_count' id='idea_"+idea_ids[x]+"_upvote' data-count="+upvotes[x]+">"+upvotes[x]+"</span><i class='fa fa-thumbs-o-up'></i></button><button onclick='down("+idea_ids[x]+");' class='downvote' style='float:left;' id='button_down_"+idea_ids[x]+"'><span class='vote_count' id='idea_"+idea_ids[x]+"_downvote' data-count="+downvotes[x]+">"+downvotes[x]+"</span><i class='fa fa-thumbs-o-down'></i></button></td></tr></tbody></table></td></tr>";
                    
                    html+=to_add;
                    
                }

                $('#table_body').html(html);
            }, "json");
            console.log("Did JSON?");
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
            $('#sort_select:first').focus();
            load_list();
            $('.vote_count').css('font-size', '10px');
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
                     <img class="icon" src="./images/list.png" style="height:40px;"/>
                  </td>
                  <td>
                     <p style="font-size:20px;text-align:center;">List of hackathon project ideas</p>
                  </td>
               </tr>
            </tbody>
         </table>
         
         
         
         <select id="sort_select" onChange="load_list();">
            <option val="top">Top</option>
            <option val="new">New</option>
         </select>
         
         <table style="width:100%;">
            <tbody id="table_body">
               
<!--               <input type="button" class="thumb_up" value="5"/>-->
               
               
            </tbody>
         </table>
      </div>
      <?php include('./footer.php'); ?>
   </body>
</html>