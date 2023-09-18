<?php

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/Article.php";


$article = Article::select(["id"=>$_POST['article_id']]);

var_dump($article);

$article[0]->title = $_POST['title'];
$article[0]->summary = $_POST['summary'];
$article[0]->content = $_POST['content'];
$article[0]->save();

header("Location: ../../index");
exit();