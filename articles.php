<!DOCTYPE html>

<?php
require_once 'vendor/autoload.php';

require_once('src/models/functions.php');

$dbCreds = databaseCredentials('.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Articles</title>
        <script src="https://kit.fontawesome.com/d1393c407a.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="src/styling/main.css">
    </head>

    <?php include_once 'src/models/navbar.php' ?>

    <body>
        <div class="text-center pt-5 container">
            <h2>Articles</h2>
            <hr>
            <?php
            include "src/models/classes/Article.php";

            if (isset($_POST['search'])) {
                $word = $_POST['search'];
                $articleQueryResult = Article::select([["title","LIKE","%$word%"]]);
                echo "<p>Results for search query '$word'</p>";

            } else {
                $articleQueryResult = Article::select(["approved"=>true]);
            }
            if (count($articleQueryResult) === 0) {
                echo 'No articles found';
            }
            foreach($articleQueryResult as $article) {
                /** @var Article $article */
                $url = $article->id . '-' . str_replace(' ', '-', $article->title);
                echo <<<EOL
<a href="article/$url">
    <div class="card text-start">
        <div class="card-body">
            <h5 class="card-title">$article->title</h5>
            <p class="card-text">$article->summary</p>
        </div>
    </div>
</a>
EOL;

                #echo '<a href="article/' .$article->ID. '-'.str_replace(" ", "-", $article->title).'">'.$article->title.'</a>';
            }
            ?>
        </div>
    </body>
</html>