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
    header("Location: login.php");
} else if ((!$userQuery[0]->roleID) > 0) {
    header("Location: codes/403.php");
}
session_abort();
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php require_once('src/models/functions.php'); echo getPageName(basename($_SERVER['PHP_SELF'])) ?></title>
        <script src="https://kit.fontawesome.com/d1393c407a.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="src/styling/main.css">
        <link rel="stylesheet" href="src/styling/articleWriter.css">
    </head>

    <?php include_once 'src/models/navbar.php' ?>

    <body>
        <div class="container">
            <h1>Article writer</h1>
            <form action="src/validation/articleCreate.php" method="post" style="float: left">
                <label for="title" class="h3">Title</label> <br>
                <?php session_start(); if (isset($_SESSION['message'])) { echo $_SESSION['message'] . '<br>'; unset($_SESSION['message']);} ?>
                <textarea name="title" id="title" placeholder="Why Aternos is amazing..." required></textarea> <br>

                <label for="summary" class="h3">Summary</label> <br>
                <textarea name="summary" id="summary" placeholder="Because Aternos is free..." required></textarea> <br>

                <label for="content" class="h3">Content</label> <br>
                <textarea name="content" id="content" placeholder="Its amazing because..." required></textarea> <br>

                <button type="submit">Submit</button>
            </form>
            <div style="float: right; padding-right: 25%">
                <h2>Remember:</h2>
                <ul>
                    <li>Keep it civil</li>
                    <li>Use proper grammar</li>
                    <li>No other hosts</li>
                    <li>Only facts</li>
                </ul>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>

