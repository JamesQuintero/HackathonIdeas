<?php
@include("init.php");
include("universal_functions.php");

$acc_id=$_SESSION['acc_id'];
$query=mysql_query("SELECT * FROM ideas WHERE acc_id='$acc_id'");
if($query&&mysql_num_rows($query)>=1)
{

$idea_ids=array();
$idea_titles=array();
$idea_contents=array();
$upvotes=array();
$downvotes=array();

if($query)
        {
           while($array=mysql_fetch_row($query))
           {
            $idea_ids[]=$array[0];
            $idea_titles[]=$array[1];
            $idea_contents[]=$array[2];
            $upvotes[]=$array[3];
            $downvotes[]=$array[4];
           }
           
        }
        
        $JSON=array();
        $JSON['idea_ids']=$idea_ids;
        $JSON['idea_titles']=$idea_titles;
        $JSON['idea_contents']=$idea_contents;
        $JSON['upvotes']=$upvotes;
        $JSON['downvotes']=$downvotes;
        echo json_encode($JSON);
        exit();
}

?>