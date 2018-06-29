<?php

class Pays{

    private $select;

    public function __construct($db){
        $this->select=$db->prepare("SELECT * FROM pays ORDER BY nom");
    }

    public function select(){
        $this->select->execute();
        return $this->select->fetchAll();
    }
}
?>