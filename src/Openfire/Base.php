<?php


namespace Tailonperin\OpenfireRestapi\Openfire;


use App\Exceptions\ValidacaoException;
use Illuminate\Support\Facades\Http;

class Base
{
    protected $domain;
    protected $credentials;
    protected $baseUrl;

    public function __construct()
    {
        $this->domain = config('openfire-restapi.connection.domain');
        $this->credentials = config('openfire-restapi.connection.credentials');
        $this->baseUrl = config('openfire-restapi.connection.base_url');
    }

    /**
     * Issue a request to the given URL and DATA.
     *
     * @return \Illuminate\Http\Client\Response
     */
    protected function enviar($sendTo, $data, $method = "post", $format = null)
    {
        if(is_null($this->baseUrl)) {
            throw new \Exception('URL não configurada');
        }

        $request = Http::withBasicAuth($this->credentials['username'] , $this->credentials['password']);

        if($format) {
            $request->bodyFormat($format);
        }

        $response = null;
        switch ($method) {
            case "post":
                $response = $request->post($this->baseUrl.$sendTo, $data);
                break;
            case "get":
                $response = $request->get($this->baseUrl.$sendTo, $data);
                break;
            case "put":
                $response = $request->put($this->baseUrl.$sendTo, $data);
                break;
            case "delete":
                $response = $request->delete($this->baseUrl.$sendTo, $data);
                break;
        }

        return $response;
    }
}
