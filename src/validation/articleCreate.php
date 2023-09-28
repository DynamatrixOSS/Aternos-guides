<?php

use Aternos\Model\models\classes\Article;

require_once('../models/functions.php');

$article = new Article();
$article->title = $_POST['title'];

session_start();

$ArticleExists = selectArticle("title", $_POST['title']);
$authorName = getAuthUser()->username;

if ($ArticleExists['status'] === 200) {
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