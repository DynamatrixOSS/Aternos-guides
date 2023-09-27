<?php

require_once ('../../vendor/autoload.php');

require_once('../models/functions.php');

$dbCreds = databaseCredentials('../../.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "../models/classes/Article.php";
include "../models/classes/User.php";



$article = new Article();
$article->title = $_POST['title'];

session_start();

$ArticleExists = Article::select(["title"=>$_POST['title']]);
$authorName = User::get($_SESSION['authenticated'])->username;

if ($ArticleExists->wasSuccessful() && count($ArticleExists) !== 0) {
    var_dump($ArticleExists);
    $_SESSION['message'] = "An article with the title " . $ArticleExists[0]->title . " already exists";
    Header('Location: ../../../create');
}

$article->author = $authorName;
$article->summary = $_POST['summary'];
$article->content = $_POST['content'];
$article->views = 0;
$article->save();

header("Location: ../../index");
exit();