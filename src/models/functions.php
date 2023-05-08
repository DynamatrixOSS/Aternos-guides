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