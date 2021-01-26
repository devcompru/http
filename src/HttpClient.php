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
    private static HttpClientInterface $instance;
    private array $instances;

    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        return self::$instance??= new static;
    }

    public function response(): ResponseInterface
    {

        return $this->instances['response'] ??= new Response();
    }
    public function request(): RequestInterface
    {
        return $this->instances['request'] ??= new Request();
    }
    public function cookies(): CookiesInterface
    {
        return $this->instances['cookies'] ??= new Cookies();
    }
    public function sessions(): SessionsInterface
    {
        return $this->instances['sessions'] ??= new Sessions();
    }

}