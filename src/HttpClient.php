<?php
declare(strict_types=1);


namespace Devcompru;

use Devcompru\Interfaces\CookiesInterface;
use Devcompru\Interfaces\HttpClientInterface;
use Devcompru\Interfaces\RequestInterface;
use Devcompru\Interfaces\ResponseInterface;
use Devcompru\Interfaces\SessionsInterface;

class HttpClient implements HttpClientInterface
{
    public function response(): ResponseInterface
    {
        // TODO: Implement response() method.

    }
    public function request(): RequestInterface
    {
        // TODO: Implement request() method.
    }
    public function cookies(): CookiesInterface
    {
        // TODO: Implement cookies() method.
    }
    public function sessions(): SessionsInterface
    {
        
    }

}