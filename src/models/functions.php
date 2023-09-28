<?php

use Aternos\Model\models\classes\User;
use Aternos\Model\models\classes\Article;

function getPageName(string $page): string {
    $name = explode(".", $page)[0];
    if ($name === 'index') {
        return 'home';
    } else {
        return $name;
    }
}

function databaseCredentials(string $pathToEnv): array {
    $env = parse_ini_file($pathToEnv);

    $host = $env['HOST'];
    $user = $env['USER'];
    $password = $env['PASSWORD'];
    $database = $env['DATABASE'];

    return ["host" => $host, "user" => $user, "password" => $password, "database" => $database];
}

function getAuthUser(): User|Array {
    session_start();

    if (!isset($_SESSION['authenticated'])) {
        return ["status" => 401, "data" => "You must be logged in to access this."];
    }

    return User::get($_SESSION['authenticated']);
}

function selectUser(string $key, string|int $value): User|Array {
    session_start();

    $user = User::select([$key=>$value])[0];

    session_abort();
    if (!$user) {
        return ["status" => 404, "data" => "A user with this $key could not be found."];
    }

    return ["status" => 200, "data" => $user];
}

function selectArticle(string $key, string|int $value): User|Array {
    session_start();

    $article = Article::select([$key=>$value])[0];

    session_abort();
    if (!$article) {
        return ["status" => 404, "data" => "An article with this $key could not be found."];
    }

    return ["status" => 200, "data" => $article];
}