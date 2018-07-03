<?php
//Non utilisé, permet de créer une table pays pour créer une liste déroulante et administrer les différents pays + stats
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