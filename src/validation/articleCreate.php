<?php

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/Article.php";

var_dump($_POST);

$article = new Article();

$article->title = $_POST['title'];
$article->summary = $_POST['summary'];
$article->content = $_POST['content'];
$article->views = 0;
$article->save();

header("Location: ../../index.php");
exit();