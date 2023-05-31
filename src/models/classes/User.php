<?php

use Aternos\Model\GenericModel;

class User extends GenericModel
{
    // the name of your model (and table)
    public static function getName() : string
    {
        return "users";
    }

    // all public properties are database fields
    public mixed $id;
    public string $username;
    public string $mail;
    public string $password;
    public int $roleID;
}