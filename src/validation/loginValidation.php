<?php

$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

require_once '../../vendor/autoload.php';

require_once('../models/functions.php');

$dbCreds = databaseCredentials();

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/User.php";
$user = new User();

$mailQueryResult = User::select(["mail" => $mail]);

if (count($mailQueryResult) === 0) {
    session_start();
    $_SESSION['exCode'] = 404;
    header("Location: ../../login.php");
}

$passwordAuthenticity = password_verify($_POST['psw'], $mailQueryResult['password']);

session_start();
if ($passwordAuthenticity) {
    $_SESSION['authenticated'] = $mailQueryResult['UID'];
    header('Location: ../../index.php');
} else {
    $_SESSION['exCode'] = 403;
    header("Location: ../../login.php");
}