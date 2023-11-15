<?php

RequirePage::model('CRUD');
RequirePage::model('Utilisateur');
RequirePage::library('Validation');

class ControllerLogin extends Controller {

    public function index(){
        Twig::render('auth/index.php');
    }

    public function auth(){
        $validation = new Validation;
        
          // Assignation des variables
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $motdepasse = isset($_POST['motdepasse']) ? $_POST['motdepasse'] : '';

        // Valide les données
        $validation->name('utilisateur')->value($nom)->max(50)->required();
        $validation->name('mot de passe')->value($motdepasse)->max(20)->min(6);
    

        if(!$validation->isSuccess()){
            $errors =  $validation->displayErrors();
         return Twig::render('auth/index.php', ['errors' =>$errors,  'utilisateur' => $_POST]);
         exit();
        }

        $utilisateur= new Utilisateur;
        $checkUtilisateur = $utilisateur->checkUtilisateur($_POST['nom'], $_POST['motdepasse']);
        

        

        Twig::render('auth/index.php', ['errors'=> $checkUtilisateur, 'utilisateur' => $_POST]);

    }

    public function logout(){
        session_destroy();
        RequirePage::url('login');
    }
}


?>