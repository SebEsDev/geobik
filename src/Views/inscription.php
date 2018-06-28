<?php
function inscription($db){

    if(isset($_POST['btInscription'])){
        extract($_POST);
        if(!empty($nom) && !empty($prenom) && !empty($date_naissance) && !empty($sexe) && !empty($email) && !empty($pays) && !empty($metier)){  
            $user=new Users($db);
            $r=$user->insert($nom,$prenom,$date_naissance,$sexe,$email,$pays,$metier);
            if($r==1){
                $msg='<div class="alert alert-success" role="alert"><h4 class="alert-heading">Inscription réussie !</h4><p>Aww yeah, bienvenue dans la grande famille de Geobik. Nous allons prochainement sortir notre nouveau produit, stay tuned ! Cliquez <a href="index.php">ici</a> pour revenir sur la page d\'acceuil.</p><hr><p class="mb-0">Vous allez recevoir un récapitulatif de votre inscription par mail.</p>
                </div>';
                $from = "geobik.seb@gmail.com";
                $to = "$email";
                $headers = "From:" . $from;
                $subject = "[Geobik] Récapitulatif de votre inscription !";
                $message = "Bonjour et merci de vous avoir inscrit sur Geobik.fr.\nVoici les détails de votre inscription :\nNom : $nom\nPrénom : $prenom\nDate de naissance : $date_naissance\nSexe : $sexe\nEmail : $email\nPays : $pays\nMétier : $metier.\n\nVous recevrez un email dès que le produit Geobik sera disponible !\n\nSi vous n'êtes pas à l'origine de cette inscription, dont worry c'est une erreur.";
                mail($to,$subject,$message, $headers);
            }else{
                $msg='<div class="alert alert-danger" role="alert">Erreur lors de l\'inscription, veuillez réessayer ultérieurement.</div>';
            }
        }else{
            $msg='<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
        }
    }

?>
    <div class="container">
        <div class="inscription">

            <?php if(isset($msg)) {
                echo $msg;
            }?>
           
            <h1>Inscription</h1>

            <form method="POST">
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" id="prenom" name="prenom">
                </div>
                <div class="form-group">
                    <label>Date de naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                </div>
                <div class="form-group">
                    <label>Sexe</label>
                    <select class="form-control" id="sexe" name="sexe">
                        <option>Homme</option>
                        <option>Femme</option>
                        <option>Non renseigné</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label>Pays</label>
                    <input class="form-control" id="pays" name="pays">
                </div>
                <div class="form-group">
                    <label>Métier</label>
                    <select class="form-control" id="metier" name="metier">
                        <option>Cadre</option>
                        <option>Employé de la fonction publique</option>
                        <option>Etudiant</option>
                        <option>Fromager</option>
                        <option>Aviateur</option>
                        <option>Astronaute</option>
                        <option>PDG</option>
                    </select>
                </div>
                <button type="submit" id="btInscription" name="btInscription" class="btn btn-primary">S'inscrire</button>
            </form>

        </div>
    </div>
<?php
}
?>