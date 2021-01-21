<?php


namespace Devcompru\Interfaces;


interface SessionsInterface
{
    public function start(array $options = null): ?bool;
    public function end(): ?bool;




    public function get(string $name = null): mixed;
    public function has($name): bool;
    public function set(string $name, mixed $value): bool;
    public function remove():bool;
    public function cleanInactive():int;

}