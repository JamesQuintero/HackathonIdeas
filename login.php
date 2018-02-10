<?php
@include('init.php');
include('universal_functions.php');

if(isset($_SESSION['id']))
{
    header("Location: ./index.php");
    exit();
}


$email=clean_string($_POST['email']);
$password=clean_string($_POST['password']);


if(isset($_POST['email'])&&isset($_POST['password']))
{
    if($email!='' && $password!='')
    {
        if(strlen($email)<=255)
        {
            if(strlen($password)<=255)
            {   
                //uses blowfish to hash the password for verification
//                $temp_salt=$email."something123";
//                $password=crypt($password, '$6$rounds=5000$'.$temp_salt.'$');

                    $query=mysql_query("SELECT id, account_id FROM users WHERE email='$email' AND password='$password' LIMIT 1");
                    if($query&&mysql_num_rows($query)==1)
                    {
                        $array=mysql_fetch_row($query);
                        $ID=$array[0];
                        $account_id=$array[1];

                            //sets the user to be logged in for a month
                            setcookie('acc_id', $account_id, strtotime('+90 days'), null, null, false, true);
                            $_SESSION['id']=$ID;
                            $_SESSION['acc_id']=$account_id;
                            $_SESSION['email']=$email;
                            echo "success";
                    }
                    else
                     echo "Password or email is incorrect";
                    
                
            }
            else
                echo "Password is too long";
        }
        else
            echo "Username is too long";
    }
    else
        echo "One or more fields are empty";
}
?>
