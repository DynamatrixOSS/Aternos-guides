<?php
session_start();
if (isset($_SESSION['authenticated'])) {
    session_destroy();
}

header("Location: ../../index.php");
exit();