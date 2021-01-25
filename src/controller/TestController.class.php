<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIcate VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/ 
use libs\system\Controller; 
use src\model\UserRepository;
use src\middleware\Authenticate;

class TestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    //exemple pour les api rest
    public function getDataApi()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: POST");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        
        $allHeaders = getallheaders();

        $auth = new Authenticate($allHeaders);

        $returnData = [
            "success" => 0,
            "status" => 401,
            "message" => "Unauthorized"
        ];

        if($auth->isAuth())
        {
            $returnData = $auth->isAuth();
            $users = array();
            $userdao = new UserRepository();

            foreach ($userdao->listeUser() as $result) {
                $arrayUser = array();
                $arrayUser['id'] = $result->getId();
                $arrayUser['prenom'] = $result->getPrenom();
                $arrayUser['nom'] = $result->getNom();
                $arrayUser['email'] = $result->getEmail();
                $users[] = $arrayUser;
            }
            //return $this->view->responseJson($users);
        }

        return $this->view->responseJson($returnData);
            
    }
}
?>
