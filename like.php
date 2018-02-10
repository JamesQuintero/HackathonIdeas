<?php
@include('init.php');
include('universal_functions.php');

$idea_id=clean_string($_POST['idea_id']);

$acc_id=$_SESSION['acc_id'];
$query=mysql_query("SELECT likes from user_votes WHERE user_id='$acc_id'");
if($query&&mysql_num_rows($query)==1)
{
   $array=mysql_fetch_row($query);
   $likes=explode("|", $array[0]);
   
   if(array_search($idea_id, $likes)===false)
   {
      $query=mysql_query("SELECT upvotes FROM ideas WHERE idea_id='$idea_id' LIMIT 1");
    if($query&&mysql_num_rows($query)==1)
    {
       $array=mysql_fetch_row($query);
       $num_likes=$array[0];

       $num_likes++;
       $query=mysql_query("UPDATE ideas SET upvotes='$num_likes' WHERE idea_id='$idea_id'");
       if($query)
          echo "success";
       else
          echo "Something went wrong";
       
       $likes[]=$idea_id;
       $likes=implode("|", $likes);
       echo $likes;
       $query=mysql_query("UPDATE user_votes SET likes='$likes' WHERE user_id='$acc_id'");
       if(!$query)
       {
          echo "failed here";
       }
       
       
    }
    else
       echo "Something went wrong";
   }
}
else
   header("Location: ./logout.php");

    


?>