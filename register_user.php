<?php
@include('init.php');
include('universal_functions.php');


$email=clean_string($_POST['email']);
$password=clean_string($_POST['password']);



    if(isset($_POST['email'])&&$email!='')
    {
        if(isset($_POST['password'])&&$password!='')
        {
            if((filter_var($email, FILTER_VALIDATE_EMAIL) == true)&& strlen($email) <255)
            {
                if(strlen($password) <= 255)
                {
                        if(is_valid_email($email))
                        {
                            //checks if email is already in use
                            $query=mysql_query("SELECT id FROM users WHERE email='$email' LIMIT 1");
                            if(mysql_num_rows($query)==0)
                            {
                                            //blowfish hashes password for database storage
//                                            $temp_salt=$email."something123";
//                                            $password=crypt($password, '$6$rounds=5000$'.$temp_salt.'$');


                                            //gives completely unique and random account id
                                            $bool=false;
                                            while($bool==false)
                                            {
                                                //gets a random SHA512 hash of random hash for the account id
                                                $temp_hash=sha1(uniqid(rand()));
                                                $temp_salt=sha1(uniqid(rand()));
                                                $account_id=crypt($temp_hash, '$6$rounds=5000$'.$temp_salt.'$');
                                                $act_id=sha1($account_id);

                                                //checks if act_id already exists
                                                $query=mysql_query("SELECT id FROM users WHERE account_id='$act_id' LIMIT 1");
                                                if($query&&mysql_num_rows($query)==0)
                                                    $bool=true;
                                            }

                                            //inserts the user into the users table
                                            $query=mysql_query("INSERT INTO users SET password='$password', email='$email', account_id='$act_id'");
                                           
                                            
                                            //inserts the user into the user_votes table
                                            $query=mysql_query("INSERT INTO user_votes SET user_id='$act_id'");
                                            

                                            //sets login cookie with value of the user's account id for a month
                                            setcookie('acc_id', $act_id, (time()+(86400*31)), null, null, false, true);
                                            $query=mysql_query("SELECT id, acc_id FROM users WHERE email='$email'");
                                            $array=mysql_fetch_row($query);
                                            $_SESSION['id']=$array[0];
                                            $_SESSION['acc_id']=$array[1];
                                            
                                            echo "success";
                                
                            }
                            else
                                echo "Email is already in use";
                        }
                        else
                            echo "Please use an actual email. We won't spam you";
                    }
                    else
                        echo "Email is invalid";
            }
            else
                echo "Password is too long";
        }
        else
            echo "Password field is empty";
    }
    else
        echo "Email field is empty";
//echo "GOT HERE2"
?>