<?php

class User extends \Aternos\Model\GenericModel
{
    // the name of your model (and table)
    public static function getName() : string
    {
        return "users";
    }

    // all public properties are database fields
    public $UID;
    public $username;
    public $mail;
    public $password;
    public $roleID;
}