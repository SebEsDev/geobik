<?php
require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;
function accueil(){

    if(isset($_GET['deconnexion'])){
        $_SESSION=array();
        session_destroy();
        session_start();
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
        $ip = $_SERVER['REMOTE_ADDR'];
        if($ip=="::1"){
            $msg="Chez vous en local ?";
            $_SESSION['pays']="Non géolocalisé";
        }else{
            $reader = new Reader('vendor\GeoLite2-City.mmdb');
            $record = $reader->city($ip);
            $msg=$record->country->name .", ". $record->mostSpecificSubdivision->name.".";
            $_SESSION['pays']=$record->country->name;
        }
?>
    <div class="container">
        <div class="accueil">
            <section class="haut-accueil">
                <h1>Geobik - une nouvelle révolution</h1>
                <hr/>
                <p>Ardeo, mihi credite, Patres conscripti (id quod vosmet de me existimatis et facitis ipsi) incredibili quodam amore patriae, qui me amor et subvenire olim impendentibus periculis maximis cum dimicatione capitis, et rursum, cum omnia tela undique esse intenta in patriam viderem, subire coegit atque excipere unum pro universis. Hic me meus in rem publicam animus pristinus ac perennis cum C. Caesare reducit, reconciliat, restituit in gratiam.</p>
                <h3>Hanc regionem diebus</h3>    
                <ul>
                    <li>Sed tamen haec cum ita tutius observentur, quidam</li>
                    <li>Post quorum necem nihilo lenius Gallus</li>
                    <li>Sed cautela nimia in peiores haeserat plagas, ut</li>
                    <li>Hac ita persuasione reducti intra moenia</li>
                </ul>
                <p>Eminuit autem inter humilia supergressa iam impotentia fines mediocrium delictorum nefanda Clematii cuiusdam Alexandrini nobilis mors repentina.</p>
            </section>
            <section class="bas-accueil">
                <p>Vous êtes localisé ici &rarr; <?php echo"$msg"?></p>    
                <a href="?page=inscription" class="btn btn-dark" role="button">Inscrivez-vous</a>

            </section>
            <!-- <a href="?page=connexion" class="btn btn-dark" role="button">Se connecter</a> -->
        </div>
    </div>
<?php
    }
}
?>