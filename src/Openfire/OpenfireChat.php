<?php


namespace Tailonperin\OpenfireRestapi\Openfire;


use Illuminate\Support\Facades\Http;

class OpenfireChat extends Base
{
    public $chatUser;
    public $chatPassword;

    public function __construct($chatUser = null, $chatPassword = null)
    {
        if($chatUser<>null){
            $this->chatUser =$chatUser;
        }
        else{
            $this->chatUser = config('openfire-restapi.chat.user');
        }
        if($chatUser<>null){
            $this->chatPassword = $chatPassword;
        }
        else{
            $this->chatPassword = config('openfire-restapi.chat.password');
        }

        parent::__construct();
    }
    
    public function setChatUser($from){
     $this->chatUser = $from;   
    }
    
    public function setChatPassword($pass){
     $this->chatPassword = $pass;   
    }

    public function enviarMensagem($mensagem, $to)
    {
        
        //chat que vai enviar
        $chatStreamResponse = $this->login($this->chatUser, $this->chatPassword);
        $chatStream = null;
        if($chatStreamResponse->status() != 200) {
            throw new \Exception("Problema ao efetuar login");
        }

        $chatStream = $chatStreamResponse->body();

        $to = "{$to}@{$this->domain}";

        $data = [
            'body' => $mensagem
        ];

        $url = "/rest/api/restapi/v1/chat/$chatStream/messages/$to";

        return $this->enviar($url, $data, 'post');
    }

    public function login($username, $pass) {
        $login = "/rest/api/restapi/v1/chat/$username/login";

        return $this->enviar($login, [
            'body' => $pass
        ], 'post', 'none');
    }
}
