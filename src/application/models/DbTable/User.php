<?php

class DbTable_User
{
    private $pdo;

    public function __construct(){
        /*
        $dsn = "mysql:dbname=project;host=127.0.0.1";
        $user = "project";
        $password = "0000";
        $this->pdo = new PDO($dsn, $user, $password);
        */
        $this->pdo = new PDO(
            "mysql:dbname=project;host=127.0.0.1", 
            "project", 
            "0000"
        );
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    
    public function find($id){
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    
}