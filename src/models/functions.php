<?php
function getPageName(string $page): string {
    $name = explode(".", $page)[0];
    if ($name === 'index') {
        return 'home';
    } else {
        return $name;
    }
}

function getConditionalClass(string $currentPage, string $intendedPage,string $classPositive, string $classNegative): string {
    if (getPageName($currentPage) === $intendedPage) {
        return $classPositive;
    } else {
        return $classNegative;
    }
}

function dbCommand(string $query, array $parameters) : mixed {
    $env = parse_ini_file('.env');

    $user = $env['USER'];
    $password = $env['PASSWORD'];

    $conn = new PDO('mysql:host=localhost;dbname=aterguides', $user, $password);

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute($parameters);
        return $stmt->fetch();
    } catch (PDOException $error) {
        return [$error->getCode(), $error];
    }
}