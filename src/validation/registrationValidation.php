<?php
$mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

$hashedPassword = password_hash($_POST["psw"], PASSWORD_DEFAULT);

require_once '../../vendor/autoload.php';

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/User.php";
$user = new User();

$usernameQuery = User::select(["username" => $_POST['username']]);
$mailQuery = User::select(["mail" => $mail]);

if (count($usernameQuery) !== 0) {
    session_start();
    $_SESSION['exCode'] = 'Username already exists.';
    header("Location: ../../register.php");
    exit();
}

if (count($mailQuery) !== 0) {
    session_start();
    $_SESSION['exCode'] = 'Mail already exists.';
    header("Location: ../../register.php");
    exit();
}

$user->username = $_POST['username'];
$user->mail = $mail;
$user->password = $hashedPassword;
$user->roleID = 0;
$user->save();

session_start();
$_SESSION['authenticated'] = $mailQueryResult['UID'];
header('Location: ../../index.php');