<?php

class Admin{

    private $selectAll;
    private $connexion;

    public function __construct($db){
        $this->selectAll=$db->prepare("SELECT * FROM admin");
        $this->connexion=$db->prepare("SELECT * from admin WHERE email=:email and password=:password");
    }

    public function selectAll(){
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function connexion($email,$password){
        $this->connexion->execute(array('email'=>$email,'password'=>$password));
        return $this->connexion->fetch();
    }
}
?>