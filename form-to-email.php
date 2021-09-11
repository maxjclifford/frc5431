<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $visitor_email = $_POST['email'];
    $team_number = $_POST['team_number']; //not required
    $message = $_POST['message'];

    if ($team_number == '') {
        $team_number = "not specified";
    }


    $email_from = "mclifford2003@gmail.com";

    $email_subject = "New Form submission";

    $email_body = "New message from: $first_name $last_name.\n
    FRC Team Number: $team_number \n".
                            "Message:\n $message".
        
    $to = "mclifford2003@gmail.com";

    $headers = "From: $email_from \r\n";

    $headers .= "Reply-To: $visitor_email \r\n";

    mail($to,$email_subject,$email_body,$headers);

    function IsInjected($str)
    {
        $injections = array('(\n+)',
               '(\r+)',
               '(\t+)',
               '(%0A+)',
               '(%0D+)',
               '(%08+)',
               '(%09+)'
               );

        $inject = join('|', $injections);
        $inject = "/$inject/i";

        if(preg_match($inject,$str))
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    if(IsInjected($visitor_email))
    {
        echo "Bad email value!";
        exit;
    }
?>