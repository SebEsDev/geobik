<?php
function modif($db){
    if(isset($_POST['btModif'])){
        extract($_POST);
        if(!empty($nom) && !empty($prenom) && !empty($date_naissance) && !empty($sexe) && !empty($email) && !empty($pays) && !empty($metier)){  
            $user=new Users($db);
            $r=$user->modif($id,$nom,$prenom,$date_naissance,$sexe,$email,$pays,$metier);
            if($r==1){
                $msg='<div class="alert alert-success" role="alert">Modification effectué. Cliqué <a href="index.php?page=dashboard">ici</a> pour retourner au dashboard.</div>';
            }else{
                $msg='<div class="alert alert-danger" role="alert">Erreur lors de la modification : pas de changement ou alors n\'oubliez pas que les doublons d\'emails sont INTERDIT.</div>';
            }
        }else{
            $msg='<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
        }
    }
    $user=new Users($db);
    $user=$user->selectUser($_GET['id']);
    $metiers=new Metiers($db);
    $liste=$metiers->select();
?>
    <div class="container">
        <div class="inscription">

            <?php if(isset($msg)) {
                echo $msg;
            }?>
           
            <h1>Modifier cet utilisateur</h1>
            <form method="POST">
                <input type="hidden" value="<?php echo $user['id']?>" name="id" id="id" />
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" id="nom" name="nom" value="<?php echo $user['nom']?>">
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" id="prenom" name="prenom" value="<?php echo $user['prenom']?>">
                </div>
                <div class="form-group">
                    <label>Date de naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $user['date_naissance']?>">
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
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']?>">
                </div>
                <div class="form-group">
                    <label>Pays</label>
                    <input class="form-control" id="pays" name="pays" value="<?php echo $user['pays']?>">
                </div>
                <div class="form-group">
                    <label>Métier</label>
                    <select class="form-control" id="metier" name="metier">
                   <?php foreach($liste as $metier){
						if($metier['intitule']==$user['metier']){
							echo '<option value="'.$metier['intitule'].'" selected>'.$metier['intitule'].'</option>';
						}
						else{
							echo '<option value="'.$metier['intitule'].'">'.$metier['intitule'].'</option>';
						}
					} ?>
                    </select>
                </div>
                <button type="submit" id="btModif" name="btModif" class="btn btn-success">Modifier</button>
            </form>

        </div>
    </div>
<?php
}
?>