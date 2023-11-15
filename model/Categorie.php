<?php
require_once('CRUD.php');

class Categorie extends CRUD {
    protected $table = 'Categories';
    protected $primaryKey = 'id';
    protected $fillable = ['nom'];
    
}
