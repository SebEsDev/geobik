<?php
function getPage(){
    $lesPages['accueil']="accueil;0";
    $lesPages['inscription']="inscription;0";
	$lesPages['connexion']="connexion;0";
	$lesPages['dashboard']="dashboard;1";
	$lesPages['ajout']="ajout;1";
	$lesPages['modif']="modif;1";

    if(isset($_GET['page'])){
		$page=$_GET['page'];
	}else{
		$page='accueil';
    }
    
    if(!isset($lesPages[$page])){
		$page='accueil';
	}

    $explose=explode(";",$lesPages[$page]);
    $role=$explose[1];

    if($role==0){
		$contenu=$explose[0];
	}
	else{
		if(isset($_SESSION['email'])){
			$roleEmail=$_SESSION['role'];
			if($roleEmail==1){
				$contenu=$explose[0];
			}
			else{
				if($roleEmail==$role){
					$contenu=$explose[0];
				}
				else{
					$contenu="accueil";
				}
			}
		}
		else{
			$contenu="accueil";
		}
	}
	return $contenu;
}
?>