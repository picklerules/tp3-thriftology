<?php
require_once('CRUD.php');

class Utilisateur extends CRUD {
    protected $table = 'Utilisateurs';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'motdepasse', 'privilege_id'];

    public function checkUtilisateur($nom, $motdepasse){

        $sql = "SELECT * FROM $this->table WHERE nom = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($nom));
        $count = $stmt->rowCount();

        if($count === 1){
            $salt = "G7j$@_ul";
            $saltMotDePasse = $motdepasse.$salt;
            
            $info_utilisateur = $stmt->fetch();
           
            
            if(password_verify($saltMotDePasse , $info_utilisateur ['MotDePasse'])){
                //session
                session_regenerate_id();
                $_SESSION['utilisateur_id'] = $info_utilisateur['ID'];
                $_SESSION['nom'] = $info_utilisateur['Nom'];
                $_SESSION['privilege'] = $info_utilisateur['privilege_id'];
                $_SESSION['authentification'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);

                RequirePage::url('vetement');
                exit();

            }else{
                $errors = "<ul><li>Verifier le mot de passe</li></ul>";
                return $errors;
            }

        }else{
            $errors = "<ul><li>Verifier le nom d'utilisateur</li></ul>";
            return $errors; 
        }


    }


}
