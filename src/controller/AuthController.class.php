<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\service\authentification\JwtHandler;

class AuthController extends Controller 
{

    public function login()
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

  

        $data = json_decode(file_get_contents("php://input"));
        $returnData = [];

         //IF REQUEST METHOD IS NOT EQUAL TO POST
        if($_SERVER["REQUEST_METHOD"] != "POST"):
            $returnData = msg(0,404,'Page Non Trouvée!');

         //CHECKING EMPTY FIELDS
        elseif(!isset($data->email) 
            || !isset($data->password)
            || empty(trim($data->email))
            || empty(trim($data->password))
            ):

            $fields = ['fields' => ['email','password']];
            $returnData = msg(0,422,'Veuillez remplir tous les champs Svp!',$fields);

         //IF THERE ARE NO EMPTY FIELDS THEN-
        else:
            $email = trim($data->email);
            $password = trim($data->password);

             //CHECKING THE email FORMAT (IF INVALID FORMAT)
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
                $returnData = msg(0,422,'Adresse mail invalide!');
            
             //IF PASSWORD IS LESS THAN 8 THE SHOW THE ERROR
            elseif(strlen($password) < 4):
                $returnData = msg(0,422,'Your password must be at least 4 characters long!');

             //THE USER IS ABLE TO PERFORM THE email ACTION
            else:
                try{
                    $userdao = new UserRepository();
                    $users = $userdao->findByEmail($email, $password);

                     //IF THE USER IS FOUNDED BY email
                    if($users):
                   
                    //VERIFYING THE PASSWORD (IS CORRECT OR NOT?)
                    //IF PASSWORD IS CORRECT THEN SEND THE email TOKEN
                         foreach ($users as $row) {

                        } 
                        
                        // if($row["password"]):

                            $jwt = new JwtHandler();
                            $token = $jwt->_jwt_encode_data(
                                'http://localhost/php_auth_api/',
                                array("id"=> $row["id"])
                            );
                            
                            $returnData = [
                                'success' => 1,
                                'message' => 'You have successfully logged in.',
                                'token' => $token,
                                'user' => $users
                            ];

                    //IF INVALID PASSWORD
                         
                      //IF THE USER IS NOT FOUNDED BY email THEN SHOW THE FOLLOWING ERROR
                     else:
                         $returnData = msg(0,422,'Email invalide !');
                     endif;
                }
                catch(Exception $e){
                    $returnData = msg(0,500,$e->getMessage());
                }

            endif;

        endif;

        return $this->view->responseJson($returnData);
    }

}