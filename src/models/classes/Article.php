<?php

class Article extends \Aternos\Model\GenericModel
{
    // use model registry (default: true)
    protected static bool $registry = true;

    // cache the model for 60 seconds (default: null)
    protected static ?int $cache = 60;

    // configure the generic model drivers (this is the default)
    protected static array $drivers = [
        \Aternos\Model\Driver\Mysqli\Mysqli::ID
    ];

    // the name of your model (and table)
    public static function getName() : string
    {
        return "articles";
    }

    // all public properties are database fields
    public $title;
    public $summary;
}