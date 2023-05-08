<nav>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <?php require_once 'functions.php'?>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../../index.php" class="nav-link px-2 <?php echo getConditionalClass(basename($_SERVER['PHP_SELF']), 'home', 'text-secondary', 'text-white');?>">Home</a></li>
                    <li><a href="#" class="nav-link px-2 <?php echo getConditionalClass(basename($_SERVER['PHP_SELF']), 'articles', 'text-secondary', 'text-white');?>">Articles</a></li>
                    <li><a href="../../about.php" class="nav-link px-2 <?php echo getConditionalClass(basename($_SERVER['PHP_SELF']), 'about', 'text-secondary', 'text-white');?>">About</a></li>
                    <li><a href="#" class="nav-link px-2 <?php echo getConditionalClass(basename($_SERVER['PHP_SELF']), 'Privacy', 'text-secondary', 'text-white');?>">FAQs</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="search.php">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <a href="register.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
                </div>
            </div>
        </div>
    </header>
</nav>