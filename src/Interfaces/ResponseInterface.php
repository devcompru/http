<?php
declare(strict_types=1);


namespace Devcompru\Interfaces;


interface ResponseInterface
{


    public function addHeader(string $name, string|float  $value):ResponseInterface;
    public function addHeaders(array $array):   ResponseInterface;
    public function hasHeader(string $name):    bool;
    public function headers(string $name):      array|string|bool;

    public function asJson():                   ResponseInterface;
    public function asHtml():                   ResponseInterface;

    public function setBody(string $body):      ResponseInterface;
    public function setCode(int $code = 200):   ResponseInterface;
    public function view(array $params, string|bool $template= false):ResponseInterface;

    public function emit():void;
    public function sendJson(string|array|object $data):void;
    public function sendError(int $code, string $message):void;


    public function disableCloseConnection():void;

}