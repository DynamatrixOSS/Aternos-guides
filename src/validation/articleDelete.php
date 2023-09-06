<?php

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/Article.php";

$articleID = $_POST['article_id'];

var_dump($articleID);

$article = Article::select(["id"=>$articleID]);
$article[0]->delete();

header('Location: ../../reviewing');