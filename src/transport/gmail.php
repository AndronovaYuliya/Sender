<?php 
require "transportInterface.php";
require "vendor/autoload.php";
$data=template(readdir(__FILE__,2).'template/Templater.php');
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
    ->setUsername('andron39933993@gmail.com')
    ->setPassword('12061987JulijA')
    ->setEncryption("tls")
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['john@doe.com' => 'John Doe'])
    ->setTo(['andron39933993@gmail.com' => 'A name'])
    ->setBody($data)
;

// Send the message
$result = $mailer->send($message);
//echo ($result);
