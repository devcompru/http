<?php


namespace Devcompru\Interfaces;


interface CookiesInterface
{

    public function get(string $name = ''): array|string;

    public function set(
        string $name,
        string $value,
        array $params = ['path'=>$path]);



}