<?php
require_once('Utilisateur.php');

class Vendeur extends Utilisateur {
    protected $table = 'Vendeurs';
    protected $primaryKey = 'id';
    protected $fillable = ['notevendeur'];

    public function selectWithNom() {
        $sql = "SELECT Vendeurs.ID, Utilisateurs.Nom FROM Vendeurs 
        INNER JOIN Utilisateurs ON Vendeurs.ID = Utilisateurs.ID";
        $stmt = $this->query($sql);
        $vendeurs = $stmt->fetchAll();
        return $vendeurs;
    }    

}
