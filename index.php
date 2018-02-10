<?php
@include('init.php');
if(!isset($_SESSION['id']))
{
    if(isset($_COOKIE['acc_id']))
    {
        $query=mysql_query("SELECT id FROM users WHERE account_id='$_COOKIE[acc_id]' LIMIT 1");
        if($query&&mysql_num_rows($query)==1)
        {
            $array=mysql_fetch_row($query);

            $_SESSION['id']=$array[0];
            header("Location: ./ideas.php");
            exit();
        }
    }
}
else
{
    header("Location: ./ideas.php");
    exit();
}

include('universal_functions.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <meta name="description" content="Hackathon Ideas is an idea aggregation site for hackathon participants" />
        <meta name="keywords" content="Hackathon, idea, list, generator, aggregation" />
        <title>Hackathon Ideas</title>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
      <?php include('code_header.php'); ?>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript" src="./main.js"></script>
      <script type="text/javascript">
         function login()
         {
            $.post('login.php',
            {
               email: $('#email').val(),
               password:$('#password').val()
            },
            function(output)
            {
               if(output=="success")
                  window.location.replace("./ideas.php");
               else
                  alert(output);
            });   
         }
         
         function register()
         {
            $.post('./register_user.php',
            {
               email: $('#email').val(),
               password: $('#password').val()
            }, function(output)
            {
//                console.log("registered");
               if(output=="success")
                  window.location.replace(window.location);
               else
                  alert(output);
                
            });
         }
         
         $(document).ready(function()
         {
            <?php
                include('required_jquery.php');
            ?>
         });
      </script>
      <script type="text/javascript">
        <?php //include('required_google_analytics.js'); ?>
      </script>
   </head>
   <body>
        <?php include('index_header.php'); ?>
       
       <div class="content">
           <p>Find great hackathon project ideas through peer-review.</p>
           <p>Browse through a list of suggested projects that have been voted well by other users.</p>
           <p>Suggest project ideas that you would like to see implemented.</p>
           
           <table style="padding-top:50px;">
              <tbody>
                 <tr>
                    <td colspan="2">
                       <input id="email" type="email" placeholder="Email..." class="input"/>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="2" >
                       <input id="password" type="password" placeholder="Password..." class="input"/>
                    </td>
                 </tr>
                 <tr>
                    <td>
                       <input type="button" value="Login" onclick="login();" class="button"/>
                    </td>
                    <td>
                       <input type="button" value="Register" onclick="register();" class="button"/>
                    </td>
                 </tr>
              </tbody>
           </table>
           
       </div>


      <?php include('footer.php'); ?>
   </body>
</html>