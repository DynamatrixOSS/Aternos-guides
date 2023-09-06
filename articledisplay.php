<!DOCTYPE html>

<?php
require_once 'vendor/autoload.php';

require_once('src/models/functions.php');

$dbCreds = databaseCredentials('.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "src/models/classes/Article.php";
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php  echo getPageName(basename($_SERVER['PHP_SELF'])) ?></title>
    <script src="https://kit.fontawesome.com/d1393c407a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styling/main.css">
</head>

<?php include_once 'src/models/navbar.php' ?>

<body>
<?php
if (isset($_SESSION['authenticated'])) {
    $userQuery = User::select(["id" => $_SESSION['authenticated']]);
}
$article_id = explode("-", explode("/", $_SERVER['REQUEST_URI'])[2])[0];


session_abort();
?>
<div class="pt-5 container">
    <div>
        <?php
            $article = Article::select(["id" => $article_id]);

            if (count($article) === 0) {
                echo '<h2>This article could not be found...</h2>';
            } else {
                if (isset($_SESSION['authenticated']) && ($userQuery[0]->roleID) >= 2) {
                    echo <<<EOL
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="/src/validation/articleDelete.php" method="POST">
            <input type="hidden" name="article_id" value="$article_id">
            <button class="btn btn-danger" type="submit">Delete article</button>
        </form>
        <hr>
EOL;
                }
                echo '<h2>' . $article[0]->title . '</h2>';
                echo $article[0]->content;
                $article[0]->views++;
                $article[0]->save();
            }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>