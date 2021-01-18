<?php
declare(strict_types=1);


namespace Devcompru;


use Devcomp\SingleTrate;
use Devcompru\Interfaces\CookiesInterface;

class Cookies implements CookiesInterface
{
    use SingleTrate;

    public function get(string $name = ''): array|string
    {
        // TODO: Implement get() method.
    }
    public function set(string $name, string $value, array $params = ['path' => $path])
    {
        // TODO: Implement set() method.
    }
}