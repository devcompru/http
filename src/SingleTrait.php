<?php


namespace Devcompru;


trait SingleTrait
{
    private static $instance = null;
    public static function getInstance()
    {
        return self::$instance ??= new static;
    }

    private function __construct(){}



}