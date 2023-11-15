<?php
require_once('CRUD.php');

class Vetement extends CRUD {
    protected $table = 'Vetements';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'description', 'prix', 'id_vendeur', 'file'];


    public function selectWithVendeur() {
        $sql = "SELECT Vetements.*, Utilisateurs.Nom AS NomVendeur FROM Vetements 
        INNER JOIN Vendeurs ON Vetements.ID_Vendeur = Vendeurs.ID
        INNER JOIN Utilisateurs ON Vendeurs.ID = Utilisateurs.ID";
        $stmt = $this->query($sql);
        $vetementVendeur = $stmt->fetchAll();
        // var_dump($vetementVendeur);
        return $vetementVendeur;
    }    

    public function getImagePath($id) {
        $sql = "SELECT file FROM $this->table WHERE id = :id";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ? "uploads/" . $result['file'] : null;
    }

}
