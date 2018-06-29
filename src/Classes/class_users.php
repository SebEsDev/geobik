<?php

class Users{

    private $insert;
    private $selectAllOrdPays;
    private $selectUser;
    private $delete;
    private $modif;

    public function __construct($db){
        $this->insert=$db->prepare("INSERT INTO users(nom, prenom, date_naissance, sexe, email, pays, metier, date_creation) values(:nom, :prenom, :date_naissance,:sexe, :email, :pays, :metier, now())");
        $this->selectAllOrdPays=$db->prepare("SELECT * FROM users ORDER BY pays");
        $this->selectUser=$db->prepare("SELECT * FROM users WHERE id=:id");
        $this->delete=$db->prepare("DELETE FROM users WHERE id=:id");
        $this->modif=$db->prepare("UPDATE users set nom=:nom, prenom=:prenom, date_naissance=:date_naissance, sexe=:sexe, email=:email, pays=:pays, metier=:metier WHERE id=:id");
    }

    /**
     * Permet l'ajout de nouveau users
     *
     * @param string $nom
     * @param string $prenom
     * @param date $date_naissance
     * @param string $email
     * @param string $pays
     * @param string $metier
     * @return void
     */
    public function insert($nom, $prenom, $date_naissance, $sexe, $email, $pays, $metier){
        $this->insert->execute(array('nom'=>$nom,'prenom'=>$prenom,'date_naissance'=>$date_naissance,'sexe'=>$sexe, 'email'=>$email,'pays'=>$pays,'metier'=>$metier));
        return $this->insert->rowCount();
    }

    /**
     * Sélection de tous les users classés par pays
     *
     * @return void
     */
    public function selectAllOrdPays(){
        $this->selectAllOrdPays->execute();
        return $this->selectAllOrdPays->fetchAll();
    }

    /**
     * Sélectionne un user avec son email
     *
     * @param String $email
     * @return void
     */ 
    public function selectUser($id){
        $this->selectUser->execute(array(':id'=>$id));
        return $this->selectUser->fetch();
    }

    /**
     * Supprime un user avec son email
     *
     * @param String $email
     * @return void
     */
    public function delete($id){
        $this->delete->execute(array(':id'=>$id));
        return $this->delete->rowCount();
    }

    /**
     * Modification d'un user
     *
     * @param integer $id
     * @param String $nom
     * @param String $prenom
     * @param Date $date_naissance
     * @param String $sexe
     * @param String $email
     * @param String $pays
     * @param String $metier
     * @return void
     */
    public function modif($id, $nom, $prenom, $date_naissance, $sexe, $email, $pays, $metier){
        $this->modif->execute(array('id'=>$id,'nom'=>$nom,'prenom'=>$prenom,'date_naissance'=>$date_naissance,'sexe'=>$sexe, 'email'=>$email,'pays'=>$pays,'metier'=>$metier));
        return $this->modif->rowCount();
    }

}
?>
