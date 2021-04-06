<?php
abstract class DbManager {

    protected $bdd;
    private $host = 'mysql';
    private $dbName = 'mvc_login_demo';
    private $username= 'root';
    private $password = 'root';

    public function __construct(){
        try {
            $this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->username, $this->password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e){
            die('Erreur '. $e->getMessage());
        }
    }
}