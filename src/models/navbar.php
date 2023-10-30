<nav>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <?php
                require_once('vendor/autoload.php');

                require_once('src/models/functions.php');

                $dbCreds = databaseCredentials('.env');

                $driver = new \Aternos\Model\Driver\Mysqli\Mysqli($dbCreds['host'], 3306, $dbCreds['user'], $dbCreds['password'], "", $dbCreds['database']);
                \Aternos\Model\Driver\DriverRegistry::getInstance()->registerDriver($driver);

                require_once("classes/User.php");

                session_start();
                if (isset($_SESSION['authenticated'])) {
                    $userQuery = User::select(["id" => $_SESSION['authenticated']]);
                }
                ?>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/index" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="/articles" class="nav-link px-2 text-white">Articles</a></li>
                    <li><a href="/about" class="nav-link px-2 text-white">About</a></li>
                    <li><a href="/faq" class="nav-link px-2 text-white">FAQs</a></li>
                    <?php
                    if (isset($_SESSION['authenticated']) && ($userQuery[0]->roleID) > 0) :?>
                    <li><a href="/create" class="nav-link px-2 text-white">Create Article</a></li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['authenticated']) && ($userQuery[0]->roleID) >= 2) :?>
                    <li><a href="/reviewing" class="nav-link px-2 text-white">Review Articles</a></li>
                    <?php endif; ?>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="/articles" method="POST">
                    <input type="search" name="search" id="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <?php
                    if (!isset($_SESSION['authenticated'])) :?>
                        <a href="/login"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                        <a href="/register"><button type="button" class="btn btn-warning">Sign-up</button></a>
                    <?php else:?>
                        <a href="/user/<?= $userQuery[0]->username ?>"><button type="button" class="btn btn-outline-light me-2"><?php echo $userQuery[0]->username ?></button></a>
                        <a href="/src/validation/logoutHandler.php"><button type="button" class="btn btn-warning">Log out</button></a>
                        <?php session_abort(); endif;?>
                </div>
            </div>
        </div>
    </header>
</nav>