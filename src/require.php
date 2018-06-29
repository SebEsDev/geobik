<?php

//Connexion à la base de données
require_once 'src/Bdd/connexion.php';
require_once 'src/Bdd/config.php';

require_once 'src/listePages.php';

require_once 'src/Views/accueil.php';
require_once 'src/Views/inscription.php';
require_once 'src/Views/connexion.php';
require_once 'src/Views/dashboard.php';
require_once 'src/Views/ajout.php';
require_once 'src/Views/modif.php';

require_once 'src/Classes/class_users.php';
require_once 'src/Classes/class_admin.php';
require_once 'src/Classes/class_metier.php';
require_once 'src/Classes/class_pays.php';