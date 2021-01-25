<?php
namespace src\middleware;
use src\service\authentification\JwtHandler;
use src\model\UserRepository;


class Authenticate extends JwtHandler
{   
    protected $headers;
    protected $token;

    public function __construct($headers)
    {
       parent::__construct();
       $this->headers = $headers;
    }

    public function isAuth()
    {
        if(array_key_exists('Authorization',$this->headers) && !empty(trim($this->headers['Authorization']))):
            $this->token = explode(" ", trim($this->headers['Authorization']));
            if(isset($this->token[1]) && !empty(trim($this->token[1]))):
                //$data = new JwtHandler();
                $data = $this->_jwt_decode_data($this->token[1]);

                if(isset($data['auth']) && isset($data['data']->id) && $data['auth']):
                    $user = $this->fetchUser($data['data']->id);
                    return $user;

                else:
                    return null;

                endif; // End of isset($this->token[1]) && !empty(trim($this->token[1]))
                
            else:
                return null;

            endif;// End of isset($this->token[1]) && !empty(trim($this->token[1]))

        else:
            return null;

        endif;
    }

    function fetchUser($id)
    {
        try{
            $userdao = new UserRepository();

            $userInfo = $userdao->findById($id);

            if($userInfo):

                return [
                    'success' => 1,
                    'status' => 200,
                    'user' => $userInfo
                ];
            else:
                return null;
            endif;
        }
        catch(Exception $e){
            return null;
        }
    }
}
