<?php
declare(strict_types=1);


namespace Devcompru;


use Devcompru\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    public function addHeader(string $name, string $value): bool
    {
        // TODO: Implement addHeader() method.
    }
    public function addHeaders(array $array): bool
    {
        // TODO: Implement addHeaders() method.
    }
    public function hasHeader(string $name): bool
    {
        // TODO: Implement hasHeader() method.
    }
    public function headers(string $name): array|string|bool
    {
        // TODO: Implement headers() method.
    }
    public function emit(): void
    {
        // TODO: Implement emit() method.
    }
}