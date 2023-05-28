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

$mailQueryResult = User::select(["mail" => $mail]);

$user->username = $_POST['username'];
$user->mail = $mail;
$user->password = $hashedPassword;
$user->roleID = 0;
$user->save();

session_start();
$_SESSION['authenticated'] = $mailQueryResult['UID'];
header('Location: ../../index.php');