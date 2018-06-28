<?php
function accueil(){

    if(isset($_GET['deconnexion'])){
        $_SESSION=array();
        session_destroy();
    }
    
    if(isset($_SESSION['email'])){
    ?>     
        <div class="container">
            <div class="accueil">
                <h1>Compte administrateur</h1>
                <a href="?page=dashboard" class="btn btn-dark" role="button">Dashboard</a>
                <a href="?page=accueil&deconnexion" class="btn btn-dark" role="button">Se déconnecter</a>
            </div>
        </div>
<?php
    }else{
?>
    <div class="container">
        <div class="accueil">
            <p>Bonjour Visiteur de France, Paris.</p>
            <a href="?page=inscription" class="btn btn-dark" role="button">S'inscrire</a>
            <a href="?page=connexion" class="btn btn-dark" role="button">Se connecter</a>
        </div>
    </div>
<?php
    }
}
?>