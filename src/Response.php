<?php
declare(strict_types=1);


namespace Devcompru;


class Response
{
    private int $code = 200;
    public string $powered_by = 'devcomp.ru';
    private string $body = '';
    private bool $as_json = true;
    private bool $error = false;
    private bool $disableCloseConnection = false;


    public function __construct()
    {
        $this->addHeader('X-Powered-By', $this->powered_by);
        $this->asJson();
    }

    public function addHeader(string $name, string|float $value): void
    {
        $name= trim($name);
        $name = implode('-', array_map(fn($el)=>ucfirst($el), explode('-',$name)));
        if(headers_sent())
            throw new \Exception('Error send headers, headers is sent');
        else
            header("$name: $value", true);


    }

    public function addHeaders(array $array): void
    {
        foreach ($array as $name=>$value)
            $this->addHeader($name, $value);

    }

    public function hasHeader(string $name): bool
    {
        $headers_list = headers_list();
        foreach ($headers_list as $value)
            if(strtoupper($name)=== strtoupper(mb_substr($value, 0,strlen($name))))
                return true;

        return false;
    }

    public function headers(string $name = ''): array|string|bool
    {
        if($name === '') {
            return headers_list();
        }
        elseif($name != '') {
            $headers_list = headers_list() ;
            foreach ($headers_list as $value)
                if(strtoupper($name)=== strtoupper(mb_substr($value, 0,strlen($name))))
                    return mb_substr($value, strlen($name)+2);
        }

        return false;
    }


    public function asJson(): void
    {
        $this->addHeader('Content-Type', 'application/json; charset=UTF-8');
        $this->as_json = true;

    }
    public function asHtml(): void
    {
        $this->addHeader('Content-Type', 'text/html; charset=UTF-8');
        $this->as_json = false;

    }

    public function setBody(string $body): void
    {
        $this->body = $body;

    }

    public function setCode(int $code = 200): void
    {
        $this->code = $code;

    }

    public function view(array|object $params, string|bool $template='' ): void
    {
        $this->body = $template;
        if(!$template) {
            $this->body = json_encode($params, JSON_UNESCAPED_UNICODE);
        }
        else{
           foreach ($params as $key=>$value)
               $this->body = str_replace('{$'.$key.'}', $value, $this->body);
        }

    }

    public function emit(): void
    {

        if($this->disableCloseConnection)
            {
                echo $this->body;
            }
        else
            {
                $this->addHeader('Connection', 'close');
                ignore_user_abort(); // optional
                ob_start();
                echo $this->body;
                $size = ob_get_length();
                $this->addHeader('Content-Length', $size);
                ob_end_flush(); // Strange behaviour, will not work
                flush();            // Unless both are called !
                session_write_close(); // Added a line suggested in the comment
                fastcgi_finish_request();

            }

    }
    public function sendJson(string|array|object $data):void
    {

        $response = [
          'error'=>$this->error,
          'code'=>$this->code,
          'body'=>$data
        ];

        $this->body = json_encode($response,JSON_UNESCAPED_UNICODE);
        $this->emit();

    }
    public function sendError(int $code, string $message):void
    {
        $this->error = true;
        $this->body = $message;
        $this->code = $code;
        $this->emit();
    }


    public function disableCloseConnection():void
    {
        $this->disableCloseConnection = true;
    }

}