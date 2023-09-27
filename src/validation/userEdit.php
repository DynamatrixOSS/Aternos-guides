<?php

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/User.php";


$user = User::select(["id"=>$_POST['user_id']]);

$user[0]->about = $_POST['about'];
$user[0]->save();

header("Location: ../../index");
exit();