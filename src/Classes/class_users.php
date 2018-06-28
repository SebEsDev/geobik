<?php

class Users{

    private $insert;

    public function __construct($db){
        $this->insert=$db->prepare("INSERT INTO users(nom, prenom, date_naissance, sexe, email, pays, metier, date_creation) values(:nom, :prenom, :date_naissance,:sexe, :email, :pays, :metier, now())");
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

}
?>
