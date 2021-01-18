<?php
declare(strict_types=1);


namespace Devcompru;


use Devcompru\Interfaces\RequestInterface;

class Request implements RequestInterface
{

    public function isHttps():  bool
    {

    }
    public function isGet():    bool
    {

    }
    public function isPost():   bool
    {

    }
    public function isDelete(): bool
    {

    }
    public function isPut():    bool
    {

    }
    public function isPatch():  bool
    {

    }

    public function method():   string
    {

    }
    public function protocol(): string
    {

    }
    public function IP():       string
    {

    }
    public function userAgent():string
    {

    }

    public function hasHeader(string $name):    bool
    {

    }
    public function get(string $name = ''):     array|string
    {

    }
    public function post(string $name = ''):    array|string
    {

    }
    public function put(string $name = ''):     array|string
    {

    }
    public function patch(string $name = ''):   array|string
    {

    }
    public function queryBody():string
    {

    }
    public function uri():      string
    {

    }

    public function headers(string $name = ''): array|string
    {

    }

}