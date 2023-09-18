<!DOCTYPE html>

<?php
require_once('src/models/functions.php')
?>

<html lang="en">
    <head>
        <link rel="stylesheet" href="src/styling/main.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $pageName = getPageName(basename($_SERVER['PHP_SELF']));?>
        <title><?php echo $pageName ?></title>
        <?php     echo "<script>console.log('debug object: " . basename($_SERVER['PHP_SELF']) . "');</script>"; ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="src/styling/about.css" >
    </head>

    <?php include_once 'src/models/navbar.php' ?>

    <body>
        <div class="container padding">
            <div class="row align-items-start">
                <div class="col">
                    <h1 class="center">About us</h1>
                    <p>We some Aternos mods and active support people, wanting to unite information, and make it easy for evryone to find.</p>
                    <h2 class="center">Where we are and where to go</h2>
                    <p>Now there are 2 Developers for this website and 6 article writers. The website is now public but still under development, here are some things we plan to add;
                        <ul>
                            <li>Add profile pages</li>
                            <li>Add user settings page</li>
                        </ul>
                        If you want to help with writing or other things can not apply to help this might change in the future 
                    </p>
                </div>

            </div>
        </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>