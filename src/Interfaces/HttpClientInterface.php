<?php


namespace Devcompru\Interfaces;


interface HttpClientInterface
{
    public function request():  RequestInterface;
    public function response(): ResponseInterface;
    public function cookies():  CookiesInterface;



}