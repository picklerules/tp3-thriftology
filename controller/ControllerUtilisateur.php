<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

RequirePage::model('CRUD');
RequirePage::model('Utilisateur');
RequirePage::model('Privilege');
RequirePage::library('Validation');

class ControllerUtilisateur extends Controller {

    public function __construct(){
        CheckSession::sessionAuth();
        if($_SESSION['privilege'] != 1) {
            RequirePage::url('login');
            exit();
        }
    }

    public function index(){
        $utilisateur = new Utilisateur;
        $select = $utilisateur->select('nom');
        
        $privilege = new Privilege;
        $i=0;
        foreach($select as $utilisateur){
             $selectId = $privilege->selectId($utilisateur['privilege_id']);
             $select[$i]['privilege']= $selectId['privilege'];
             $i++;
        }
        return Twig::render('utilisateur/index.php', ['utilisateurs'=>$select]);
    }

    public function create(){ 
            $privilege = new Privilege;
            $select = $privilege->select('privilege');
            return Twig::render('utilisateur/create.php', ['privileges' => $select]);
    }

    public function store(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('utilisateur')->value($nom)->max(50)->required();
        $validation->name('mot de passe')->value($motdepasse)->max(20)->min(6);
        $validation->name('privilege')->value($privilege_id)->required();

        if(!$validation->isSuccess()){
            // var_dump($validation->getErrors());
            $errors =  $validation->displayErrors();
            //echo $errors;
            $privilege = new Privilege;
            $select = $privilege->select('privilege');
         return Twig::render('utilisateur/create.php', ['errors' =>$errors, 'privileges' => $select, 'utilisateur' => $_POST]);
         exit();
        }

        $utilisateur = new Utilisateur;

        $options = [
            'cost' => 10
        ];
        $salt = "G7j$@_ul";
        $saltMotDePasse = $_POST['motdepasse'].$salt;
        $_POST['motdepasse'] =  password_hash($saltMotDePasse , PASSWORD_BCRYPT, $options);
        
        $insert = $utilisateur->insert($_POST);

        RequirePage::url('utilisateur');
    }


}


?>