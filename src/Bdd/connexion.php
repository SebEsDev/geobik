<?php

/**
 * Connect
 * @param array $config Informations de connexion
 */
function connect($config){
	try{
        $db=new PDO('mysql:host='.$config['serveur'].';dbname='.$config['bdd'],$config['login'],$config['mdp']);
	}
	catch(Exception $e){
		//echo 'Echec'.$e->getMessage(); //->>Fonction pour afficher les messages d'erreurs
        $db=NULL;
	}
	return $db;
}
?>