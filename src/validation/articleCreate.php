<?php

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/Article.php";


$article = new Article();
$article->title = $_POST['title'];

$ArticleExists = Article::select(["title"=>$_POST['title']]);

if ($ArticleExists->wasSuccessful()) {
    session_start();
    var_dump($ArticleExists);
    $_SESSION['message'] = "An article with the title " . $ArticleExists[0]->title . " already exists";
    Header('Location: ../../../create.php');
}

$article->summary = $_POST['summary'];
$article->content = $_POST['content'];
$article->views = 0;
$article->save();

header("Location: ../../index.php");
exit();