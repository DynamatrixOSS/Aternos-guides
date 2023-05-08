<!DOCTYPE html>

<?php
require_once('src/models/functions.php')
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
        <div class="text-center pt-5 container">
            <h1>Aterguides</h1>
            <div class="card border-warning bg-warning-subtle my-5">
                <div class="card-body">
                    <i class="fa-solid fa-triangle-exclamation fa-fade fa-2xl" style="color: #ffa50a;"></i>
                    <span>We are not an official site, and we are not affiliated with Aternos, Aternos GmbH, exaroton and it's associates and employees.</span>
                </div>
            </div>
            <p>Welcome to Aternos Guides, an article site ran by Aternos regulars and an Aternos moderator. Here you may find all kinds of articles about topics and issues that are not covered in Aternos' help center itself. Have an issue that you don't know the fix to? Try our articles below, in the articles page or join the Aternos discord for help.</p>

            <a href="about.php"><button class="btn btn-primary">About Us</button></a>
            <a href="articles.php"><button class="btn btn-outline-primary">Articles</button></a>
            <hr>
        </div>

        <div class="container pt-5">
            <div class="float-start" style="margin-left: 25%">
                <h2>Popular articles</h2>
                <ul class="hidden">
                    <li>Example article 1</li>
                    <li>Example article 2</li>
                    <li>Example article 3</li>
                </ul>
            </div>

            <div class="float-end" style="margin-right: 25%">
                <h2>Pinned articles</h2>
                <ul class="hidden">
                    <li>Example article 1</li>
                    <li>Example article 2</li>
                    <li>Example article 3</li>
                </ul>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>