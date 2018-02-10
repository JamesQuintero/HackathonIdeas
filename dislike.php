<?php
@include('init.php');
include('universal_functions.php');

$idea_id=clean_string($_POST['idea_id']);

$acc_id=$_SESSION['acc_id'];
$query=mysql_query("SELECT dislikes from user_votes WHERE user_id='$acc_id'");
if($query&&mysql_num_rows($query)==1)
{
   $array=mysql_fetch_row($query);
   $dislikes=explode("|", $array[0]);
   
   if(array_search($idea_id, $dislikes)===false)
   {
    $query=mysql_query("SELECT downvotes FROM ideas WHERE idea_id='$idea_id' LIMIT 1");
    if($query&&mysql_num_rows($query)==1)
    {
       $array=mysql_fetch_row($query);
       $num_dislikes=$array[0];

       $num_dislikes++;
       $query=mysql_query("UPDATE ideas SET downvotes='$num_dislikes' WHERE idea_id='$idea_id'");
       if($query)
          echo "success";
       else
          echo "Something went wrong";
       
       $dislikes[]=$idea_id;
       $dislikes=implode("|", $dislikes);
       echo $dislikes;
       $query=mysql_query("UPDATE user_votes SET dislikes='$dislikes' WHERE user_id='$acc_id'");
       if(!$query)
       {
          echo "failed here";
       }
    }
    else
       echo "Something went wrong";
   }
   else
      echo "You have already voted on this item";
}
else
   header("Location: ./logout.php");


?>