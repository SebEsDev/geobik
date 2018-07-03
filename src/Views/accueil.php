<?php
require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;

function accueil(){
    if(isset($_GET['deconnexion'])){    //Permet de se déconnecter, à ameliorer (incorporer dans le nav?)
        $_SESSION=array();
        session_destroy();
        session_start();
    }

    if(isset($_SESSION['email'])){      //Accueil admin
?>     
        <div class="container">
            <div class="accueil_admin">
                <h1>Compte administrateur</h1>
                <hr/>
                <p>Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.</p>
                <a href="?page=dashboard" class="btn btn-dark" role="button">Dashboard</a>
                <a href="?page=accueil&deconnexion" class="btn btn-dark" role="button">Se déconnecter</a>
            </div>
        </div>
<?php
    }else{
        $reader = new Reader('vendor\GeoLite2-City.mmdb');    //lecture bdd geolite
        $ip = $_SERVER['REMOTE_ADDR'];    //récupération de l'adresse ip du client
        if($ip=="::1"){     ///définition du pays et région, à modifier (ajout d'autre couche de récupération de localisation si la précedente ne fonctionne pas, perso du message, etc)
            $msg="Chez vous en local ?";
            $_SESSION['pays']="Non géolocalisé";    //solution pour récuperer le pays du visiteur de la session actuelle
        }else{
            $record = $reader->city($ip);
            $msg=$record->country->name .", ". $record->mostSpecificSubdivision->name.".";     //msg contenant le pays et la région, à modifier (affichage nul quand la région n'est pas dispo)
            $_SESSION['pays']=$record->country->name;
        }
?>
        <div class="container">
            <div class="accueil">
                    <h1>Geobik - une nouvelle révolution</h1>
                    <hr/>
                    <p>Ardeo, mihi credite, Patres conscripti (id quod vosmet de me existimatis et facitis ipsi) incredibili quodam amore patriae, qui me amor et subvenire olim impendentibus periculis maximis cum dimicatione capitis, et rursum, cum omnia tela undique esse intenta in patriam viderem, subire coegit atque excipere unum pro universis. Hic me meus in rem publicam animus pristinus ac perennis cum C. Caesare reducit, reconciliat, restituit in gratiam.</p>
                    <p id="contour">Vous êtes localisé ici &rarr; <?php echo"$msg"?></p>
                    <hr/>
                    <img src="public/img/background_accueil_article.jpg" class="img-fluid" alt="Un chemin de fer en forêt.">               
                    <hr/>
                    <p>Ardeo, mihi credite, Patres conscripti (id quod vosmet de me existimatis et facitis ipsi) incredibili quodam amore patriae, qui me amor et subvenire olim impendentibus periculis maximis cum dimicatione capitis, et rursum, cum omnia tela undique esse intenta in patriam viderem, subire coegit atque excipere unum pro universis. Hic me meus in rem publicam animus pristinus ac perennis cum C. Caesare reducit, reconciliat, restituit in gratiam.</p>
                    <a href="?page=inscription" class="btn btn-dark" role="button">Inscrivez-vous</a>  <!--Inscription toujours dispo, modifiable (visible seulement si le pays est obtenu ?) -->
                    <hr/>
                <footer>
                    <div class="copyright">Copyright © 2018 Geobik - <a href="?page=connexion">admin</a></div>
                </footer>
            </div>
        </div>
<?php
    }
}
?>