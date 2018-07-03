<?php

function dashboard($db){
    if(isset($_POST['btSupprimer'])){  //fonction permettant de supprimer un à un les différents visiteurs
		if(isset($_POST['cocher'])){
            $ok=0;
            $erreur=0;
			$cocher=$_POST['cocher'];
			foreach($cocher as $id){
				$user=new Users($db);
				$q=$user->delete($id);
				if($q==1){
					$ok+=1;
				}else{
					$erreur+=1;
				}
            }
            $msg="<div class='alert alert-warning' role='alert'>$ok utilisateurs supprimés. $erreur erreur(s).</div>";
		}
    }
    $users=new Users($db);
    $liste=$users->selectAllOrdPays();
?>
    <div class="container">
        <div class="dashboard">
<?php
    if(isset($msg)){
        echo $msg;
    }
?>
            <form method="POST">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">Pays</th>
                            <th scope="col">Métier</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
<?php 
    foreach($liste as $user){
        echo '
            <tr>
                <th scope="row"><a href="index.php?page=modif&id='.$user['id'].'">'.$user['id'].'</a></th>
                <td>'.$user['prenom'].'</td>
                <td>'.$user['nom'].'</td>
                <td>'.$user['date_naissance'].'</td>
                <td>'.$user['email'].'</td>
                <td>'.$user['sexe'].'</td>
                <td>'.$user['pays'].'</td>
                <td>'.$user['metier'].'</td>
                <td><input type="checkbox" id="cocher[]" name="cocher[]" value="'.$user['id'].'"/></td>
            </tr>';
    }
    ?>  
                    </tbody>
                </table>
                <a href="?page=ajout" class="btn btn-success" role="button">Ajouter un utilisateur</a>
                <button type="submit" class="btn btn-danger" id="btSupprimer" name="btSupprimer">Supprimer les users sélectionnés</button>
            </form>
        </div>
    </div>
<?php
}
?>