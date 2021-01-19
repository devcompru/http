<?php


namespace Devcompru\Interfaces;


interface RequestInterface
{

    public function isHttps():  bool;
    public function isGet():    bool;
    public function isPost():   bool;
    public function isDelete(): bool;
    public function isPut():    bool;
    public function isPatch():  bool;
    public function hasHeader(string $name):    bool;

    public function getMethod():   string;
    public function getProtocol(): string;
    public function getIP():       string;
    public function getUserAgent():string;


    public function get(?string $name = null):        array|string|bool;
    public function post(?string $name = null):       array|string|bool;
    public function put(?string $name = null):        array|string|bool;
    public function patch(?string $name = null):      array|string|bool;
    public function getHeaders(?string $name = null): array|string|bool;

    public function getUri():        string;
    public function getQueryBody():  string;
    public function getQueryString():string|bool;





}