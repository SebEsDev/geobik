<?php
function connexion($db){

    if(isset($_POST['btConnecter'])){
        extract($_POST);
        if(!empty($email) && !empty($password)){  
            $admin=new Admin($db);
            $r=$admin->connexion($email,$password);
            if($r!=FALSE){
                $_SESSION['email']=$email;
                $_SESSION['role']=1;
                accueil();
                exit;
            }else{
                $msg='<div class="alert alert-danger" role="alert">Erreur lors de la connexion, l\'email ou le mot de passe est incorrecte.</div>';
            }
        }else{
            $msg='<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs.</div>';
        }
    }
?>
    <div class="container">
        <div class="connexion">

            <?php if(isset($msg)) {
                echo $msg;
            }?>

            <h1>Connexion à l'espace d'administration</h1>

            <form method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" id="btConnecter" name="btConnecter">Se connecter</button>
            </form>

        </div>
    </div>
<?php
}
?>