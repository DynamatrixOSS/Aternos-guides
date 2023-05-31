<?php
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