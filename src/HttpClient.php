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
    use SingleTrait;

    public function response(): ResponseInterface
    {
        echo "2 ";
        return  Response::getInstance();

    }
    public function request(): RequestInterface
    {
        return Request::getInstance();
    }
    public function cookies(): CookiesInterface
    {
        return Cookies::getInstance();
    }
    public function sessions(): SessionsInterface
    {
        return Sessions::getInstance();
    }

}