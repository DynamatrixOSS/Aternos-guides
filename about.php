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

    </head>

    <?php include_once 'src/models/navbar.php' ?>

    <body>
        <div class="card-group">
            <div class="card">
                <img class="img" src="https://cdn.discordapp.com/avatars/820255805257023498/74d5106b0e3be86c8abcd3e6dbbfd34e.webp?size=4096" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card">
                <img class="img" src="https://cdn.discordapp.com/avatars/820255805257023498/74d5106b0e3be86c8abcd3e6dbbfd34e.webp?size=4096" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
            <div class="card">
                <img class="img" src="https://cdn.discordapp.com/avatars/820255805257023498/74d5106b0e3be86c8abcd3e6dbbfd34e.webp?size=4096" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5class="card-title text-center" >Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>