<?php
require_once('CRUD.php');

class Transaction extends CRUD {
    protected $table = 'Transactions';
    protected $primaryKey = 'id';
    protected $fillable = ['id_acheteur', 'id_vetement', 'date'];

}
