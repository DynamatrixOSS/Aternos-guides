<?php

$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/User.php";

$mailQueryResult = User::select(["mail" => $mail]);

if (count($mailQueryResult) === 0) {
    session_start();
    $_SESSION['exCode'] = "Mail not found.";
    header("Location: ../../login");
}

$passwordAuthenticity = password_verify($_POST['psw'], $mailQueryResult[0]->password);

session_start();
if ($passwordAuthenticity) {
    $_SESSION['authenticated'] = $mailQueryResult[0]->id;
    header('Location: ../../index');
    return;
} else {
    $_SESSION['exCode'] = 'Incorrect password.';
    header("Location: ../../login");
    return;
}