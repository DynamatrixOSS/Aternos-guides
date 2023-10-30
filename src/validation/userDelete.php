<?php

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/User.php";

$userID = $_POST['user_id'];

$user = User::get($userID);
var_dump($user);
$user[0]->delete();

echo $user[0]->id;

session_start();

if ($user[0]->id === $_SESSION['authenticated']) {
    header('Location: logoutHandler.php');
}

header('Location: /index');