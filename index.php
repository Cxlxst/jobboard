<?php
include "Modeles/monPdo.php";
include "Modeles/gestionAnnonce.class.php";
include "Modeles/gestionMetier.class.php";
include "Modeles/gestionVille.class.php";
include "Modeles/gestionContrat.class.php";

if(empty($_GET["uc"])){
    $uc = "accueil";
}
else{
    $uc = $_GET["uc"];
}

switch($uc){
    case "accueil":
        include "Controleurs/controleurGestion.php";
        break;

}