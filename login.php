<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php require_once('src/models/functions.php'); echo getPageName(basename($_SERVER['PHP_SELF'])) ?></title>
        <script src="https://kit.fontawesome.com/d1393c407a.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="src/styling/auth.css">
    </head>

    <?php include_once 'src/models/navbar.php' ?>

    <body>
        <form action="/src/validation/loginValidation.php" method="post">

            <div class="container">
                <label for="user"><b>e-mail address</b></label>
                <input type="email" placeholder="example@gmail.com" name="mail" id="user" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                <?php
                if (isset($_SESSION['exCode'])) {
                    echo '<p class="text-warning">' . $_SESSION['exCode'] . '<br>';
                }
                session_destroy();
                ?>
                <button type="submit" name="login">Login</button>
            </div>

            <div class="container footer">
                <button type="button" class="cancelbtn" onclick="history.back()">Cancel</button>
                <span class="psw"><a href="register.php">Don't have an account?</a></span>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>