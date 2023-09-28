<?php

$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

include "../models/classes/User.php";

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

$mailQueryResult = selectUser("mail", $mail);

if ($mailQueryResult['status'] !== 200) {
    $_SESSION['exCode'] = $mailQueryResult['data'];
}

$passwordAuthenticity = password_verify($_POST['psw'], $mailQueryResult['data']->password);

session_start();
if ($passwordAuthenticity) {
    $_SESSION['authenticated'] = $mailQueryResult['data']->id;
    header('Location: ../../index');
    return;
}

$_SESSION['exCode'] = 'Incorrect password.';
    header("Location: ../../login");
return;