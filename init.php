<?php
ob_start();
ini_set('session.cookie_httponly', true);
session_start();
session_cache_limiter();


//$host="localhost"; //localhost
//$username="root"; //database username
//$password=""; //password for user to database
//$db_name="hackathonideas"; //name of database

//opens connection to mysql server

$dbc= mysql_connect("$host","$username", "$password" );
if(!$dbc)
{
//    $from='no-reply@email.com';
//
//    $array=array();
//    $array['key']="";
//    $array['secret']="";
//    $amazonSes = new AmazonSES($array);
//    $amazonSes->verify_email_address($from);
//
//    $amazonSes->send_email($from,
//        array('ToAddresses' => array('example@email.com')),
//        array(
//            'Subject.Data' => "Website down!",
//            'Body.Text.Data' => mysql_error(),
//        )
//    );

    die("We are sorry, but it looks like HackathonIdeas.org is down right now. ");
}

//select database
$db_selected = mysql_select_db("$db_name", $dbc);
if(!$db_selected)
{
//    $from='no-reply@email.com';
//
//    $array=array();
//    $array['key']="";
//    $array['secret']="";
//    $amazonSes = new AmazonSES($array);
//    $amazonSes->verify_email_address($from);
//
//    $amazonSes->send_email($from,
//        array('ToAddresses' => array('example@email.com')),
//        array(
//            'Subject.Data' => "Website down!",
//            'Body.Text.Data' => mysql_error(),
//        )
//    );

    die("What");
}

?>
