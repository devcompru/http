<?php


namespace Devcompru\Interfaces;


interface CookiesInterface
{

    public function get(string $name = null): array|string;

    public function set ( string $name , string $value = "" , int $expires = 0 , string $path = "" , string $domain = "" , bool $secure = false , bool $httponly = false ) : bool;

    public function remove($name, int $expires = null, string $path = null, string $domain = null, bool $secure = null, bool $httponly = null): bool;

    public function has($name):bool;

}