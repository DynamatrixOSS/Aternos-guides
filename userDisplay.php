<!DOCTYPE html>

<?php
require_once 'vendor/autoload.php';

require_once('src/models/functions.php');

$dbCreds = databaseCredentials('.env');

$driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
\Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

include "src/models/classes/User.php";
include "src/models/classes/Article.php";

$username = explode("-", explode("/", $_SERVER['REQUEST_URI'])[2]);
$user = User::select(["username" => $username[0]]);

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo 'Aternos Guides - ' . $user[0]->username ?></title>
    <script src="https://kit.fontawesome.com/d1393c407a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="description" content="<?= $user[0]->about ?>">
    <meta name="author" content="<?= $user[0]->username ?>">
    <link rel="stylesheet" href="/src/styling/main.css">
</head>

<body>
<?php include_once 'src/models/navbar.php' ?>

<?php
if (isset($_SESSION['authenticated'])) {
    $userQuery = User::select(["id" => $_SESSION['authenticated']]);
}


session_abort();
?>
<div class="pt-5 container">
    <div>
        <?php

        if (count($user) === 0) {
            echo '<h2>This article could not be found...</h2>';
        } else {
            if (isset($_SESSION['authenticated']) && ($userQuery[0]->roleID) >= 2) {
                echo <<<EOL
                        <div class="btn-group">            
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="/src/validation/userDelete.php" method="POST">
                            <input type="hidden" name="user_id" value="{$user[0]->id}">
                            <button class="btn btn-danger" type="submit">Delete user</button>
                        </form>
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="/src/validation/userEditRole.php" method="POST">
                            <input type="hidden" name="user_id" value="{$user[0]->id}">
                            <select name="role">
                                <option value="0">User</option>
                                <option value="1">Writer</option>
                                <option value="2">Admin</option>
                            </select>
                            <button class="btn btn-danger" type="submit">Update role</button>
                        </form>
                        EOL;
            }
            if ((isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === $user[0]->id) || (isset($userQuery) && $userQuery[0]->roleID >= 1)) {
                echo <<<EOL
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="/userEditor.php" method="POST">
                            <input type="hidden" name="user_id" value="{$user[0]->id}">
                            <button class="btn btn-warning" type="submit">Edit user</button>
                        </form>
                        </div>
                        <hr>
                    EOL;

            }
        }
        ?>
    </div>
    <div>
        <h1><?= $user[0]->username ?></h1>
        <?= $user[0]->about ?>
    </div>
    <?php
        $articleQueryResult = Article::select(["author"=>$user[0]->username]);

        if (count($articleQueryResult) !== 0) {
            echo " 
<div class=\"text-center pt-5 container\">
<h2>Articles</h2>
</div>";
            foreach ($articleQueryResult as $article) {
                /** @var Article $article */
                $url = $article->id . '-' . str_replace(' ', '-', $article->title);
                echo <<<EOL
<a href="/article/$url">
    <div class="card text-start">
        <div class="card-body">
            <h5 class="card-title">$article->title</h5>
            <p class="card-text">$article->summary</p>
        </div>
    </div>
</a>
EOL;
            }
        }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>