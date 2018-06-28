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
            <h1>Geobik - une nouvelle révolution</h1>
            <hr/>
            <p>Ardeo, mihi credite, Patres conscripti (id quod vosmet de me existimatis et facitis ipsi) incredibili quodam amore patriae, qui me amor et subvenire olim impendentibus periculis maximis cum dimicatione capitis, et rursum, cum omnia tela undique esse intenta in patriam viderem, subire coegit atque excipere unum pro universis. Hic me meus in rem publicam animus pristinus ac perennis cum C. Caesare reducit, reconciliat, restituit in gratiam.</p>
            <hr/>
            <article>
                <h3>Hanc regionem diebus</h3>    
                <ul>
                    <li>Sed tamen haec cum ita tutius observentur, quidam</li>
                    <li>Post quorum necem nihilo lenius Gallus</li>
                    <li>Sed cautela nimia in peiores haeserat plagas, ut</li>
                    <li>Hac ita persuasione reducti intra moenia</li>
                </ul>
            </article>
             
            <a href="?page=inscription" class="btn btn-dark" role="button">S'inscrire</a>
            <!-- <a href="?page=connexion" class="btn btn-dark" role="button">Se connecter</a> -->
        </div>
    </div>
<?php
    }
}
?>