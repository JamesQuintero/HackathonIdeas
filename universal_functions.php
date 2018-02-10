<?php

function log_IP($file_name)
{
    //counts view
    $path = "./IP_addresses/".$file_name."_IPs.txt";
    $contents=file_get_contents($path);
    $contents=explode('|', $contents);

    $date=time();
    $IP = $_SERVER['REMOTE_ADDR'];
    
    $timezone=8;
    $new_date=date('F j, Y g:iA', ($date-($timezone*60*60)));
    $contents[]=($new_date."<>".$IP);
    
    
    $contents=implode("|", $contents);
    file_put_contents($path, $contents);
    
}

function clean_string($string)
{
    return trim(mysql_real_escape_string(htmlentities(stripslashes($string), ENT_COMPAT, 'UTF-8')));
}

function load_contents($path)
{
   return file($path, FILE_IGNORE_NEW_LINES);
}

function append_to_file($path, $line)
{
   file_put_contents($path, $line, FILE_APPEND);
}


//checks if email isn't a temporary email
function is_valid_email($email)
{
    if(strstr($email, "mailinator")==true) return false;
    else if(strstr($email, "guerrillamail")==true) return false;
    else if(strstr($email, 'dispostable')==true)return false;
    else if(strstr($email, 'disposemail')==true)return false;
    else if(strstr($email, 'yopmail')==true)return false;
    else if(strstr($email, 'getairmail')==true)return false;
    else if(strstr($email, 'fakeinbox')==true)return false;
    else if(strstr($email, '10minutemail')==true)return false;
    else if(strstr($email, '20minutemail')==true)return false;
    else if(strstr($email, 'deadaddress')==true)return false;
    else if(strstr($email, 'emailsensei')==true)return false;
    else if(strstr($email, 'emailthe')==true)return false;
    else if(strstr($email, 'incognitomail')==true)return false;
    else if(strstr($email, 'koszmail')==true)return false;
    else if(strstr($email, 'mailcatch')==true)return false;
    else if(strstr($email, 'mailnesia')==true)return false;
    else if(strstr($email, 'mytrashmail')==true)return false;
    else if(strstr($email, 'noclickemail')==true)return false;
    else if(strstr($email, 'spamspot')==true)return false;
    else if(strstr($email, 'spamavert')==true)return false;
    else if(strstr($email, 'spamfree24')==true)return false;
    else if(strstr($email, 'tempemail')==true)return false;
    else if(strstr($email, 'trashmail')==true)return false;
    else if(strstr($email, 'easytrashmail')==true)return false;
    else if(strstr($email, 'easytrashemail')==true)return false;
    else if(strstr($email, 'jetable')==true)return false;
    else if(strstr($email, 'mailexpire')==true)return false;
    else if(strstr($email, 'emailexpire')==true)return false;
    else if(strstr($email, 'meltmail')==true)return false;
    else if(strstr($email, 'spambox')==true)return false;
    else if(strstr($email, 'tempomail')==true)return false;
    else if(strstr($email, 'tempoemail')==true)return false;
    else if(strstr($email, '33mail')==true)return false;
    else if(strstr($email, 'e4ward')==true)return false;
    else if(strstr($email, 'gishpuppy')==true)return false;
    else if(strstr($email, 'inboxalias')==true)return false;
    else if(strstr($email, 'mailnull')==true)return false;
    else if(strstr($email, 'spamex')==true)return false;
    else if(strstr($email, 'spamgourmet')==true)return false;
    else if(strstr($email, 'dudmail')==true)return false;
    else if(strstr($email, 'mintemail')==true)return false;
    else if(strstr($email, 'spambog')==true)return false;
    else if(strstr($email, 'flitzmail')==true)return false;
    else if(strstr($email, 'eyepaste')==true)return false;
    else if(strstr($email, '12minutemail')==true)return false;
    else if(strstr($email, 'onewaymail')==true)return false;
    else if(strstr($email, 'disposableinbox')==true)return false;
    else if(strstr($email, 'freemail')==true)return false;
    else if(strstr($email, 'koszmail')==true)return false;
    else if(strstr($email, '0wnd')==true)return false;
    else if(strstr($email, '2prong')==true)return false;
    else if(strstr($email, 'binkmail')==true)return false;
    else if(strstr($email, 'amilegit')==true)return false;
    else if(strstr($email, 'bobmail')==true)return false;
    else if(strstr($email, 'brefmail')==true)return false;
    else if(strstr($email, 'bumpymail')==true)return false;
    else if(strstr($email, 'dandikmail')==true)return false;
    else if(strstr($email, 'despam')==true)return false;
    else if(strstr($email, 'dodgeit')==true)return false;
    else if(strstr($email, 'dump-email')==true)return false;
    else if(strstr($email, 'email60')==true)return false;
    else if(strstr($email, 'emailias')==true)return false;
    else if(strstr($email, 'emailinfive')==true)return false;
    else if(strstr($email, 'emailmiser')==true)return false;
    else if(strstr($email, 'emailtemporario')==true)return false;
    else if(strstr($email, 'emailwarden')==true)return false;
    else if(strstr($email, 'ephemail')==true)return false;
    else if(strstr($email, 'explodemail')==true)return false;
    else if(strstr($email, 'fakeinbox')==true)return false;
    else if(strstr($email, 'fakeinformation')==true)return false;
    else if(strstr($email, 'filzmail')==true)return false;
    else if(strstr($email, 'fixmail')==true)return false;
    else if(strstr($email, 'get1mail')==true)return false;
    else if(strstr($email, 'getonemail')==true)return false;
    else if(strstr($email, 'haltospam')==true)return false;
    else if(strstr($email, 'ieatspam')==true)return false;
    else if(strstr($email, 'ihateyoualot')==true)return false;
    else if(strstr($email, 'imails')==true)return false;
    else if(strstr($email, 'inboxclean')==true)return false;
    else if(strstr($email, 'ipoo')==true)return false;
    else if(strstr($email, 'mail4trash')==true)return false;
    else if(strstr($email, 'mailbidon')==true)return false;
    else if(strstr($email, 'maileater')==true)return false;
    else if(strstr($email, 'mailexpire')==true)return false;
    else if(strstr($email, 'mailin8r')==true)return false;
    else if(strstr($email, 'mailinator2')==true)return false;
    else if(strstr($email, 'mailincubator')==true)return false;
    else if(strstr($email, 'mailme')==true)return false;
    else if(strstr($email, 'mailnull')==true)return false;
    else if(strstr($email, 'mailzilla')==true)return false;
    else if(strstr($email, 'meltmail')==true)return false;
    else if(strstr($email, 'nobulk')==true)return false;
    else if(strstr($email, 'nowaymail')==true)return false;
    else if(strstr($email, 'pookmail')==true)return false;
    else if(strstr($email, 'proxymail')==true)return false;
    else if(strstr($email, 'putthisinyourspamdatabase')==true)return false;
    else if(strstr($email, 'quickinbox')==true)return false;
    else if(strstr($email, 'safetymail')==true)return false;
    else if(strstr($email, 'snakemail')==true)return false;
    else if(strstr($email, 'sharklasers')==true)return false;
    else 
        return true;
}
