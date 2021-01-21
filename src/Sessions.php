<?php
declare(strict_types=1);


namespace Devcompru;



use Devcompru\Interfaces\SessionsInterface;

class Sessions implements SessionsInterface
{


    public function start(array $options = null): ?bool
    {
        return  session_start($options);
    }

    public function end(): ?bool
    {
        return session_write_close();
    }

    public function get(string $name = null): mixed
    {
        $params = $_SESSION;
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

    public function has($name):bool
    {
        return isset($_SESSION[$name]);
    }
    public function set(string $name, mixed $value): bool
    {
        if(session_status() === PHP_SESSION_ACTIVE)
            $_SESSION[trim($name)] = $value;
        else
            return false;
        return true;
    }

    public function cleanInactive(): int
    {
        return session_gc();
    }
}