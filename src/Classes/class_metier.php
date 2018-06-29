<?php

class Metiers{

    private $select;

    public function __construct($db){
        $this->select=$db->prepare("SELECT * FROM metiers ORDER BY intitule");
    }

    public function select(){
        $this->select->execute();
        return $this->select->fetchAll();
    }
}
?>
