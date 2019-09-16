<?php
require_once "./vendor/autoload.php";

// echo "hello world";
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/myapp-247610-a8191d2f6d8d.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    // ->withDatabaseUri('https://myapp-247610.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();
die(print_r($database));
?>