<?php
declare(strict_types=1);


namespace Devcompru\Interfaces;


interface ResponseInterface
{

    public function addHeader(string $name, string $value):bool;
    public function addHeaders(array $array):   bool;
    public function hasHeader(string $name):    bool;

    public function headers(string $name):      array|string|bool;

    public function emit():void;


}