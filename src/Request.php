<?php
declare(strict_types=1);


namespace Devcompru;



use Devcompru\Interfaces\RequestInterface;

class Request implements RequestInterface
{

    private string $method = '';
    private array $headers = [];
    private array $parsed_uri = [];

    private array $bodyParams = [];

    public function __construct()
    {
        $this->method = (isset($_SERVER['REQUEST_METHOD']))?$_SERVER['REQUEST_METHOD']:'GET';
        $headers = getallheaders();
        foreach ($headers as $key => $value)
            $this->headers[strtoupper($key)] = $value;
        unset($headers);
        $this->parsed_uri = (isset($_SERVER['REQUEST_URI']))?parse_url($_SERVER['REQUEST_URI']):parse_url('/');

    }
    public function isHttps():  bool
    {
        return ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 'HTTPS');
    }
    public function isGet():    bool
    {
        return $this->method === 'GET';
    }
    public function isPost():   bool
    {
        return $this->method === 'POST';
    }
    public function isDelete(): bool
    {
        return $this->method === 'DELETE';
    }
    public function isPut():    bool
    {
        return $this->method === 'PUT';
    }
    public function isPatch():  bool
    {
        return $this->method === 'PATCH';
    }

    public function getMethod():   string
    {
        return $this->method;
    }
    public function getProtocol(): string
    {
        return isset($_SERVER['SERVER_PROTOCOL'])?$_SERVER['SERVER_PROTOCOL']:'';
    }
    public function getIP():       string
    {
        $value = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $value = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $value = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            $value = $_SERVER['REMOTE_ADDR'];
        }
        return $value;
    }
    public function getUserAgent():string
    {
        return isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
    }

    public function hasHeader(string $name):    bool
    {
        if(isset($this->headers[strtoupper($name)])){
            return true;
        }
        return false;
    }
    public function get(?string $name = null):     array|string|bool
    {
        $params = $_GET;
        return $this->getParamsByName($params, $name);
    }
    public function post(?string $name = null):    array|string|bool
    {
        if(!$this->isPost())
            return false;
        $body = $this->getQueryBody();

        $this->bodyParams = $this->getParamsByBody($body);

        return $this->getParamsByName($this->bodyParams, $name);
    }
    public function put(?string $name = null):     array|string|bool
    {
        if(!$this->isPut())
            return false;
        $body = $this->getQueryBody();

        $this->bodyParams = $this->getParamsByBody($body);

        return $this->getParamsByName($this->bodyParams, $name);

    }
    public function patch(?string $name = null):   array|string|bool
    {
        if(!$this->isPatch())
            return false;
        $body = $this->getQueryBody();

        $this->bodyParams = $this->getParamsByBody($body);
        return $this->getParamsByName($this->bodyParams, $name);

    }
    public function getQueryString():string|bool
    {

        return $this->parsed_uri['query']??=false;
    }
    public function getUri():      string
    {
        return $this->parsed_uri['path'];
    }

    public function getHeaders(?string $name = null): array|string|bool
    {
        $params = $this->headers;

        return $this->getParamsByName($params, $name);
    }
    public function getQueryBody(): string
    {
       return file_get_contents("php://input");
    }

    /**
     * HELPERS
     */
    private function isJson($data)
    {
        json_decode($data);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    private function getParamsByName($params, $name)
    {
        if($name === null){
            return $params;
        }
        elseif ($name!=null && isset($params[$name])){
            return $params[$name];
        }
        else{
            return '';
        }
    }
    private function getParamsByBody($body)
    {
        if($this->isJson($body))
            $params = json_decode($body, true);
        else
            parse_str($body, $params);

        return $params;
    }

}