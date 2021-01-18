<?php
declare(strict_types=1);


namespace Devcompru;


use Devcomp\SingleTrate;
use Devcompru\Interfaces\SessionsInterface;

class Sessions implements SessionsInterface
{
    use SingleTrate;

    public function get(string $name = ''): mixed
    {
        // TODO: Implement get() method.
    }

    public function set(string $name, mixed $value): bool
    {
        // TODO: Implement set() method.
    }
}