<?php
session_start();
require_once 'vendor/autoload.php';
$google_client = new Google_Client();
$google_client->setClientId('544704495372-fpfq5q8ke4mtoa05cso7i7hnh6utdmjo.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/fiverr/customer/register.php');
$google_client->addScope('email');
$google_client->addScope('profile');
?>