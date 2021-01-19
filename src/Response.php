<?php
declare(strict_types=1);


namespace Devcompru;



use Devcompru\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    private int $code = 200;
    private string $body = '';
    private bool $as_json = true;
    private bool $error = false;
    use SingleTrait;

    private function __construct()
    {
        $this->asJson();
    }

    public function addHeader(string $name, string|float $value): ResponseInterface
    {
        if(headers_sent())
            throw new \Exception('Error send headers, headers is sent');
        else
            header("$name: $value", true);

        return $this;
    }

    public function addHeaders(array $array): ResponseInterface
    {
        // TODO: Implement addHeaders() method.
    }

    public function hasHeader(string $name): bool
    {
        // TODO: Implement hasHeader() method.
    }

    public function headers(string $name): array|string|bool
    {
        // TODO: Implement headers() method.
    }

    public function asJson(): ResponseInterface
    {
        $this->addHeader('Content-Type', 'application/json; charset=UTF-8');
        $this->as_json = true;
        return $this;
    }
    public function asHtml(): ResponseInterface
    {
        $this->addHeader('Content-Type', 'text/html; charset=UTF-8');
        $this->as_json = false;
        return $this;
    }

    public function setBody(string $body): ResponseInterface
    {
        $this->body = $body;
        return $this;
    }

    public function setCode(int $code = 200): ResponseInterface
    {
        $this->code = $code;
        return $this;
    }

    public function view(array|object $params, string|bool $template='' ): ResponseInterface
    {
        $this->body = $template;
        if(!$template) {
            $this->body = json_encode($params, JSON_UNESCAPED_UNICODE);
        }
        else{
           foreach ($params as $key=>$value)
               $this->body = str_replace('{$'.$key.'}', $value, $this->body);
        }
        return $this;
    }

    public function emit(): void
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



        exit;
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
}