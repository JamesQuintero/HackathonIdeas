<?php
@include('init.php');
include('universal_functions.php');



$idea_title=clean_string($_POST['idea_title']);
$idea_contents=clean_string($_POST['idea']);


//idea_title is varchar in db, so length <255
if($idea_title!='' && strlen($idea_title)<255)
{
   if($idea_contents!="" && strlen($idea_contents)<10000)
   {
      $account_id=$_SESSION['acc_id'];
      if($account_id!="")
      {
       $current=time();
       $query=mysql_query("INSERT INTO ideas SET idea_title='$idea_title', idea='$idea_contents', timestamp='$current', acc_id='$account_id'");
       if($query)
          echo "success";
       else
          echo "Problem submitting to database";
      }
      else
      {
         header("Location: ./logout.php");
      }
   }
   else
      echo "Invalid idea body";
}
else
   echo "Invalid idea title";
