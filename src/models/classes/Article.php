<?php

use Aternos\Model\GenericModel;

class Article extends GenericModel
{
    // the name of your model (and table)
    public static function getName() : string
    {
        return "articles";
    }

    // all public properties are database fields
    public mixed $ID;
    public string $title;
    public string $summary;
    public string $content;
    public int $views;
}