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

    public function getMethod():   string;
    public function getProtocol(): string;
    public function getIP():       string;
    public function getUserAgent():string;

    public function hasHeader(string $name):    bool;
    public function get(string $name = ''):     array|string;
    public function post(string $name = ''):    array|string;
    public function put(string $name = ''):     array|string;
    public function patch(string $name = ''):   array|string;
    public function getQueryBody():string;
    public function getUri():   string;

    public function getHeaders(string $name = ''): array|string;



}