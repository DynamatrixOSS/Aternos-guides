<?php
require_once ('vendor/autoload.php');

require_once('src/models/functions.php');

$dbCreds = databaseCredentials('.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

require_once ("src/models/classes/User.php");

session_start();
$userQuery = User::select(["id" => $_SESSION['authenticated']]);

if (!isset($_SESSION['authenticated'])) {
    header("Location: login");
} else if ((!$userQuery[0]->roleID) > 2) {
    header("Location: codes/403");
}
session_abort();
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
    <h2>Review Articles</h2>
    <p>Review and approve articles prior to publishing them to ensure that they are all in good conduct.</p>
    <hr>
    <?php
    include "src/models/classes/Article.php";

    $articleQueryResult = Article::select(["approved"=>false]);

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
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="src/validation/articleApprove.php" method="POST">
                    <input type="hidden" name="article_id" value="$article->id">
                    <button class="btn btn-primary" type="submit">Approve article</button>
                </form>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="src/validation/articleDelete.php" method="POST">
                    <input type="hidden" name="article_id" value="$article->id">
                    <button class="btn btn-danger" type="submit">Delete article</button>
                </form>
        </div>
    </div>
</a>
EOL;
    }
    ?>
</div>
</body>
</html>
