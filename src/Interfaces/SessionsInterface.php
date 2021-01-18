<?php


namespace Devcompru\Interfaces;


interface SessionsInterface
{
    public function get(string $name = ''): mixed;

    public function set(string $name, mixed $value): bool;
}