<?php
declare(strict_types=1);


namespace Devcompru;




class HttpClient
{

    protected array $instances;
    protected Response $response;
    protected Request $request;
    protected Cookies $cookies;
    protected Sessions $sessions;

    public function response(): Response
    {

        return $this->response ??= new Response();
    }
    public function request(): Request
    {
        return $this->request ??= new Request();
    }
    public function cookies(): Cookies
    {
        return $this->cookies ??= new Cookies();
    }
    public function sessions(): Sessions
    {
        return $this->sessions ??= new Sessions();
    }

}