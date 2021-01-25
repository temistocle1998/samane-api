<?php
use libs\system\Controller;
use src\service\authentification\JwtHandler;
use src\model\UserRepository;


class RegisterController extends Controller 
{
    public function register()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: POST");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        function msg($success,$status,$message,$extra = []){
            return array_merge([
                'success' => $success,
                'status' => $status,
                'message' => $message
            ],$extra);
        }

        // GET DATA FORM REQUEST
        $data = json_decode(file_get_contents("php://input"));
        $returnData = [];

        // IF REQUEST METHOD IS NOT POST
        if($_SERVER["REQUEST_METHOD"] != "POST"):
            $returnData = msg(0,404,'Page Not Found!');

        // CHECKING EMPTY FIELDS
        elseif(!isset($data->prenom)
            || !isset($data->nom) 
            || !isset($data->email) 
            || !isset($data->password)
            || empty(trim($data->nom))
            || empty(trim($data->email))
            || empty(trim($data->password))
            ):

            $fields = ['fields' => ['prenom','nom','email','password']];
            $returnData = msg(0,422,'Please Fill in all Required Fields!',$fields);

        // IF THERE ARE NO EMPTY FIELDS THEN-
        else:

            $prenom = trim($data->prenom);
            $nom = trim($data->nom);
            $email = trim($data->email);
            $password = trim($data->password);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
                $returnData = msg(0,422,'Invalid Email Address!');
            
            elseif(strlen($password) < 8):
                $returnData = msg(0,422,'Your password must be at least 8 characters long!');

            elseif(strlen($nom) < 3):
                $returnData = msg(0,422,'Your nom must be at least 3 characters long!');

            else:
                try{

                   $userdb = new UserRepository();
                   $user = new User();
                   $user_email = $userdb->findEmailUsers($email);


                    if($user_email == '1'):
                        $returnData = msg(0,422, 'This E-mail already in use!');
                    
                    else:
                        $user->setPrenom($prenom);
                        $user->setNom($nom);
                        $user->setEmail($email); 
                        $user->setPassword($password); 
                      
                        $save = $userdb->addUser($user);

                        if ($save) {
                            $returnData = msg(1,201,'You have successfully registered.');
                        }
                        else{
                            $returnData = msg(0,201,'failed to register');
                        }
                        

                    endif;

                }
                catch(PDOException $e){
                    $returnData = msg(0,500,$e->getMessage());
                }
            endif;
            
        endif;

        return $this->view->responseJson($returnData);
    }
}