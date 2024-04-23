<?php

 $reciever = "menay8070@gmail.com";
 $subject = " Email Testing via PHP using local host";
 $body = "Hello,nn It is a testing email sent by local host";
 $sender = "From: menayaser80@gmail.com";

 if (mail($reciever, $subject, $body, $sender)) {
   echo "Email successfully sent to $reciever...";
 } else {
   echo "Email sending failed...";
 }

?>