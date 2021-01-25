<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/ 
use libs\system\Controller; 
use src\model\UserRepository;
use src\middleware\Authenticate;


class UserController extends Controller{
    public function __construct(){
        parent::__construct();
    }
    /** 
     * url pattern for this method
     * localhost/projectName/Test/
     */

    public function index(){

        return $this->view->load("user/index");
    }
    /** 
     * url pattern for this method
     * localhost/projectName/Test/getId/value
     */

    public function getId($id){
        $data['id'] = $id;

        return $this->view->load("user/get_id", $data);
    }
    
    public function get($id){
        
        $data['test'] = $tdb->getUser($id);
        
        return $this->view->load("user/get", $data);
    }
    /** 
     * url pattern for this method
     * localhost/projectName/Test/liste
     */
    public function liste(){
        $tdb = new UserRepository();
        
        $data['users'] = $tdb->listeUser();
        return $this->view->load("user/liste", $data);
    }
     /** 
     * url pattern for this method
     * localhost/projectName/Test/add
     */
    public function add(){
        $tdb = new UserRepository();
        if(isset($_POST['valider']))
        {
            extract($_POST);
            $data['ok'] = 0;
            if(!empty($valeur1) && !empty($valeur2)) {
                
                $userObject = new Test();
                
                $userObject->setValeur1(addslashes($valeur1));
                $userObject->setValeur2(addslashes($valeur2));

                $ok = $tdb->addTest($userObject);
                $data['ok'] = $ok;
            }
            return $this->view->load("user/add", $data);
        }else{
            return $this->view->load("user/add");
        }
    }
     /** 
     * url pattern for this method
     * localhost/projectName/Test/update
     */
    public function update(){
        $tdb = new UserRepository();
        if(isset($_POST['modifier'])){
            extract($_POST);
            if(!empty($id) && !empty($valeur1) && !empty($valeur2)) {
                $userObject = new Test();
                $userObject->setId($id);
                $userObject->setValeur1($valeur1);
                $userObject->setValeur2($valeur2);
                $ok = $tdb->updateUser($userObject);
            }
        }
        
        return $this->liste();
    }
     /** 
     * url pattern for this method
     * localhost/projectName/Test/delete/value
     */
    public function delete($id){
        
        $tdb = new UserRepository();
        $tdb->deleteUser($id);
        return $this->liste();
    }
    /** 
     * url pattern for this method
     * localhost/projectName/Test/edit/value
     */
    public function edit($id){
        
        $tdb = new UserRepository();
        
        $data['user'] = $tdb->getUser($id);
        var_dump($tdb->getUser($id));
        return $this->view->load("user/edit", $data);
    }


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

        return $this->view->responseJson($users);
        //  var_dump($auth->isAuth());   
    }
}
?>