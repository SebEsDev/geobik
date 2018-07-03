<?php

function ajout($db){
    if(isset($_POST['btAjout'])){
        extract($_POST);
        if(!empty($nom) && !empty($prenom) && !empty($date_naissance) && !empty($sexe) && !empty($email) && !empty($pays) && !empty($metier)){  
            $user=new Users($db);
            $r=$user->insert($nom,$prenom,$date_naissance,$sexe,$email,$pays,$metier);
            if($r==1){
                $msg='<div class="alert alert-success" role="alert">Ajout effectué.</div>';
                $from = "geobik.seb@gmail.com";
                $to = "$email";
                $headers = "From:" . $from;
                $subject = "[Geobik] Récapitulatif de votre inscription !";
                $message = "Bonjour et merci de vous avoir inscrit sur Geobik.fr.\nVoici les détails de votre inscription :\nNom : $nom\nPrénom : $prenom\nDate de naissance : $date_naissance\nSexe : $sexe\nEmail : $email\nPays : $pays\nMétier : $metier.\n\nVous recevrez un email dès que le produit Geobik sera disponible !\n\nSi vous n'êtes pas à l'origine de cette inscription, dont worry c'est une erreur.";
                mail($to,$subject,$message, $headers);
                $subjectAdmin = "[Geobik] Nouvel inscrit !";
                $messageAdmin = "Nouvelle inscription sur Geobik.fr.\nVoici les détails d'inscription :\nNom : $nom\nPrénom : $prenom\nDate de naissance : $date_naissance\nSexe : $sexe\nEmail : $email\nPays : $pays\nMétier : $metier.";
                $admin=new Admin($db);
                $q=$admin->selectAll();
                foreach($q as $unAdmin){
                    mail($unAdmin['email'],$subjectAdmin,$messageAdmin,$headers);
                }
            }else{
                $msg='<div class="alert alert-danger" role="alert">Erreur lors de l\'inscription, veuillez réessayer ultérieurement.</div>';
            }
        }else{
            $msg='<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
        }
    }
    $metiers=new Metiers($db);
    $liste=$metiers->select();
?>
    <div class="container">
        <div class="ajout">
<?php
    if(isset($msg)) {
        echo $msg;  
    }
?>
           
            <h1>Ajouter un utilisateur
                <small class="text-muted"><a href="?page=dashboard">Retour dashboard</a></small>
            </h1>
            <hr/>
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
                        <?php foreach($liste as $metier){ 
                            echo '<option value="'.$metier['intitule'].'">'.$metier['intitule'].'</option>';
                        }?>
                    </select>
                </div>
                <button type="submit" id="btAjout" name="btAjout" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
<?php
}
?>