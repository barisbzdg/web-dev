<?php
session_start();
require_once "GoogleAPI/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("18490321169-cpk59epf0vp371rjgm2t49f5qr1gd3tl.apps.googleusercontent.com");
$gClient->setClientSecret("jEQ_eZRh3f8cpEFasv-w20oj");
$gClient->setApplicationName("motorsportslife22");
$gClient->setRedirectURI("http://motorsports.life/girisYap/g-callback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login" );

 ?>
