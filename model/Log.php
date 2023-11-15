<?php
require_once('CRUD.php');

class Log extends CRUD {

    protected $table = 'log';
    protected $primaryKey = 'id';

    protected $fillable = ['adresseIP', 'date', 'utilisateur', 'pageVisitee'];

    public function selectAll() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>