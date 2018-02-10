<?php
    if(isset($_COOKIE['acc_id']))
    {
            //gets the user id and sets it
            $query=mysql_query("SELECT id, email FROM users WHERE account_id='$_COOKIE[acc_id]' LIMIT 1");
            if($query&&mysql_num_rows($query)==1)
            {
                $array=mysql_fetch_row($query);
                $_SESSION['id']=$array[0];
                $_SESSION['email']=$array[1];
                $_SESSION['acc_id']=$_COOKIE['acc_id'];
            }

            //deletes cookie if acc_id isn't valid or doesn't exist
            else
                setcookie('acc_id', '', (time()-(1)), null, null, false, true);
    }

    //sets user's cookie acc_ids
    else if(isset($_SESSION['id']))
    {
        $query=mysql_query("SELECT account_id, email FROM users WHERE id=$_SESSION[id] LIMIT 1");
        if($query&&mysql_num_rows($query)==1)
        {
            $array=mysql_fetch_row($query);
            $account_id=$array[0];
            $_SESSION['email']=$array[1];

            //sets the user to be logged in for 3 months
            setcookie('acc_id', $account_id, strtotime('+90 days'), null, null, false, true);
        }
    }


?>