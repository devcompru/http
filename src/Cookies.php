<?php
declare(strict_types=1);


namespace Devcompru;



class Cookies
{



    public function get(string $name = null): array|string
    {
        $params = $_COOKIE;
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

    public function set(string $name, string $value = "", int $expires = null, string $path = null, string $domain = null, bool $secure = null, bool $httponly = null): bool
    {
        $expires ??= time()+3600*24*3;
        $path ??= '/';
        $domain ??= $_SERVER['HTTP_HOST'];
        $secure ??= true;
        $httponly ??= true;
        $name = trim($name);
        $value = trim($value);
        return setcookie($name, $value, $expires , $path, $domain, $secure, $httponly);
    }

    public function remove($name, int $expires = null, string $path = null, string $domain = null, bool $secure = null, bool $httponly = null): bool
    {
        $expires ??= time()-3600*24*30;
        $path ??= '/';
        $domain ??= $_SERVER['HTTP_HOST'];
        $secure ??= true;
        $httponly ??= true;
        $name = trim($name);
        $value = '';
        return setcookie($name, $value, $expires , $path, $domain, $secure, $httponly);
    }

    public function has($name, int $expires = null, string $path = null, string $domain = null, bool $secure = null, bool $httponly = null): bool
    {
        return isset($_COOKIE[$name]);
    }

}