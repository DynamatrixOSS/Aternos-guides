<?php

class Article extends \Aternos\Model\GenericModel
{
    // the name of your model (and table)
    public static function getName() : string
    {
        return "articles";
    }

    // all public properties are database fields
    public $title;
    public $summary;
}